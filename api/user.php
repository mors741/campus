<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("general.php");

function base64_to_imj($base64, $output) {
    $ifp = fopen($output, "wb"); 
    $data = explode(',', $base64_string);
    fwrite($ifp, base64_decode($data[1])); 
    fclose($ifp); 
}

$check_login = function($req) {
	$ans = [];
	$db = get_db_connection();
	$login =  $req['login'];
	$query = create_select($db, 'users', ['login' => 'login'], ['login' => $login]); 
	$res = $db->query($query) or die('mysql error');	
	$ans['is_free'] = empty($res->fetch_array(MYSQLI_ASSOC));
	return $ans;
};

$create = function($req) {
	$ans = [];
	$error = false;
	$db = get_db_connection();
	$mandatory = ['login', 'passwd', 'name', 'surname', 'role'];
	foreach ($mandatory as $field) {
		if ( !array_key_exists($field, $req) ) {
			$error = true;
		}
	}
	$ans['success'] = !$error; 
	
	if ( $req['role'] == 'staff' ) {
		$post = $req['post'];
		unset($req['post']);
	}
	
	if ( !$error ) {
		$req['passwd'] = md5($req['passwd']);
		$query = create_insert($db, 'users', $req);
		$res = $db->query($query);
		if ( $res == false ) {
			$ans['success'] = false;
			$ans['cause'] = 'sql';
			return $ans;
		}
		if ( $req['role'] == 'staff' ) {
			$query = create_select($db, 'users', ['id' => 'id'], ['login' => $req['login']]);
			$res = $db->query($query);
			$res = $res->fetch_array(MYSQLI_ASSOC);
			$req = [
				'uid' => $res['id'],
				'sid' => $post,
			];
			$query = create_insert($db, 'staff', $req);
			$res = $db->query($query);
		}
	} else {
		$ans['cause'] = 'mandatory fields';
	}
	return $ans; 
};

$create_user = function($req) {
	global $create;
	if ( array_key_exists('home', $req) ) {
		$req['role'] = 'campus';
	} else {
		$req['role'] = 'local';
	}
	return $create($req);
};

$get = function($req) {
	$ans = [];
	$db = get_db_connection();
	$login = $req['login'];
	$fields = [	'login' => 'login',
				'name' => 'name',
				'surname' => 'surname',
				'patronymic' => 'patronymic',				
				'address' => 'address',
				'contacts' => 'contacts',
				'bdate' => 'bdate',
				'gender' => 'gender',
				'picture' => 'picture',
	];
	if ( array_key_exists('raw', $req) && $req['raw'] ) {
		$table = 'users';
		unset($fields['address']);
		$fields['home'] = 'home';
		$fields['room'] = 'room';
	} else {
		$table = 'users_v';
	}
	$query = create_select($db, $table, $fields, ['login' => $login]); 
	$res = $db->query($query) or die ("sql error");
	$ans = $res->fetch_array(MYSQLI_ASSOC);
	if ( empty($ans) ) {
		$ans['is_free'] = true;
	}
	return $ans; 
};

$update_image = function($req){
	$ans = ['success' => true];
	$login = $_SESSION['login'];
	$db = get_db_connection();

	if ( $login != 'guest' ){
		$fname = $login . '.jpg';
		$fbase = "../pictures/user/";
		$lbase = "/campus/pictures/user/";
		base64_to_img($req['data'], $fbase.$fname);
		$query = create_update(
			$db, 'users',
			['picture' => $lbase.$fname],
			['login' => $login]
		);
		$db->query($query);
	} else {
		$ans['success'] = false;
		$ans['error'] = 'auth';
	}
	return $ans;
};

$update_pass = function($req){
	$db = get_db_connection();
	$login = $_SESSION['login'];
	$old_pass = md5($req['pass']);
	$new_pass = md5($req['new_pass']);

	$query = create_update($db, 'users', ['passwd' => $new_pass], ['login' => $login, 'passwd' => $old_pass]);
	if ( $db->query($query) == false ) {
		return [
			'success' => false,
			'error' => 'sql',
		];
	}
	return ['success' => $db->affected_rows == 1];
};

$update = function($req){
	$ans = [];
	$db = get_db_connection();
	$login = $req['login'];

	$query = create_update($db, 'users', $req, ['login' => $login]);
	$res = $db->query($query);
	$ans['success'] = !($res == false);
	return $ans;
};

$current = function($req){
	$ans['login'] = $_SESSION['login'];
	$ans['role'] = $_SESSION['role'];	
	return $ans;
};

$login = function($req){
	$ans = [];
	$db = get_db_connection();
	
	$login = $req['login'];
	$pass = md5($req['pass']);
	$query = create_select(
		$db, 'users',
		[
			'role' => 'role',
			'home' => 'home',
			'id' => 'id'
		],
		['login' => $login, 'passwd' => $pass]
	);
	$res = $db->query($query);
	
	if ( $res == false ) {
		$ans['error'] = 'sql';
		$ans['success'] = false;
	} else {
		$res = $res->fetch_array();
		if ( empty($res) ) {
			$ans['error'] = 'wrong login or passwd';
			$ans['success']= false;
		} else {
			$ans['success']= true;
			$ans['login']= $login;
			$ans['role']= $res['role'];
			
			$_SESSION['login'] = $login;
			$_SESSION['role'] = $res['role'];
			$_SESSION['id'] = $res['id'];
			$_SESSION['home'] = $res['home'];
			update_cookie();
		}
	}
	return $ans;
};

$house = function($req){
	$ans = [];
	$db = get_db_connection();
	$query = create_select($db, 'address', ['house' => 'house', 'street' => 'street', 'id' => 'id'], []);
	$res = $db->query($query);
	
	if ( $res != false ) {
		while ( $row = $res->fetch_array(MYSQLI_ASSOC) ) {
			array_push($ans, $row);
		}
	}
	return $ans;
};

$logout = function($req){
	session_destroy();
	$ans['success'] = true;
	return $ans;
};

$handlers = [
	'check_login' => $check_login,
	'create' => $create,
	'create_user' => $create_user,
	'update' => $update,
	'update_pass' => $update_pass,
	'get' => $get,
	'login' => $login,
	'logout' => $logout,
	'current' => $current,
	'house' => $house,
	'update_image' => $update_image,
];

$req = get_json();
if ( !array_key_exists('type', $req) ) {
	die("no type");
} 

$type = $req['type'];
unset($req['type']);
if ( !array_key_exists($type, $handlers) ) {
	die("wrong type");
}

print (
	json_encode(
		$handlers[$type]($req)
		)
	);