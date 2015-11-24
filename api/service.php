<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("general.php");

$create = function($req) {
	$ans = [];
	$error = false;
	$db = get_db_connection();
	$mandatory = ['login', 'post', 'description', 'ordate', 'timeint'];
	foreach ($mandatory as $field) {
		if ( !array_key_exists($field, $req) ) {
			$error = true;
		}
	}

	if ( !$error ) {
		$request = [
			'id' = 0,
			'owner' = 0,
			'performer' = 0,
			'description' = $req['description'],
			'serv' = 0,
			'ordate' = $req['ordate'],
			'timeint' = $req['timeint'],
			'date_create' = date("Y-m-d H:i:s");
		]

		// get id from user
		$query = create_select($db, 'users', ['id' => 'id'], ['login' => $req['login']]);
		$res = $db->query($query);
		if ( $res == false ) {
			$error = true;
		} 
		else {
			$request['id'] = $res['id'];
		}

		// get serv
		$query = create_select($db, 'service', ['id' => 'serv'], ['name' => $req['post']]);
		$res = $db->query($query);
		if ( $res == false ) {
			$error = true;
		} 
		else {
			$request['serv'] = $res['serv'];
		}

		// get owner ???!!!


		$query = create_insert($db, 'orders', $request);
		$res = $db->query($query);
		if ( $res == false ) {
			$error = true;
		} 
	}

	$ans['success'] = !$error; 
	return $ans; 
};


$handlers = [
	'create' => $create,
	'get_state' => $get_state,
	'set_state' => $set_state,
	'get_orders' => $get_orders,
	'get_work' => $get_work,
	'get_rating' => $get_rating,
	'delete' => $delete,
	'get_protest' => $get_protest,
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