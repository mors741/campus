<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("general.php");

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
	if ( !$error ) {
		$req['passwd'] = md5($req['passwd']);
		$query = create_insert($db, 'users', $req);
		$res = $db->query($query);
		if ( $res == false ) {
			$ans['success'] = fasle;
			$ans['cause'] = 'sql';
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

$update_pass = function($req){
	$db = get_db_connection();
	$login = $req['login'];
	$old_pass = md5($res['pass']);
	$new_pass = md5($res['new_pass']);

	$query = create_update($db, 'users', ['passwd' => $new_pass], ['login' => $login, 'passwd' => $lod_pass]);
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