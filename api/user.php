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

$update = function($req){
	$ans = [];
	$db = get_db_connection();
	$login = $req['login'];
	$query = create_update($db, 'users', $req, ['login' => $login]);
	$res = $db->query($query);
	if ( $res == false ) {
		$ans['success'] = false;
	} else {
		$ans['success'] = true;
	}
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
	$query = create_select($db, 'users', ['role' => 'role'], ['login' => $login, 'passwd' => $pass]);
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
	'update' => $update,
	'get' => $get,
	'login' => $login,
	'logout' => $logout,
	'current' => $current,
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