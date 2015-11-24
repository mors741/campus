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
	$fields = [	'id' => 'id',
				'login' => 'login',
				'role' => 'role',
				'name' => 'name',
				'surname' => 'surname',
				'patronymic' => 'patronymic',				
				'home' => 'home',
				'floor' => 'floor',
				'room' => 'room',
				'contacts' => 'contacts',
				'picture' => 'picture',
				'bdate' => 'bdate',
				'gender' => 'gender',
	];
	
	$query = create_select($db, 'users', $fields, ['login' => $login]); 
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


$handlers = [
	'check_login' => $check_login,
	'create' => $create,
	'update' => $update,
	'get' => $get,
];

$req = get_json();
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