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
	print ( json_encode($ans) ); 
};

$regitstration = function($req) {
	$ans = [];
	
}

$hadlers = [
	'check_login' => $check_login, 
];
$req = get_json();
$hadlers[$req['type']]($req);