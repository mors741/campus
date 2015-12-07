<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("general.php");

$mine = function($req) {
	$error = false;
	$db = get_db_connection();

	$where = [];
	if ( array_key_exists('owner', $req) ) {
		$where['owner'] = $req['owner'];
	}

	$select = [
		'id' => 'id',
		'description' => 'description',
		'checked' => 'checked',
		'ts' => 'ts',
		'owner' => 'owner',
		'address' => 'address',
		'categories' => 'categories'
	];

	$query = create_select($db, 'ad_v', $select, $where);
	$res = $db->query($query) or die ("sql error");

	$rows = [];
	while ( $order = $res->fetch_array(MYSQLI_ASSOC) ) {
		$rows[] = $order;
	}
	$answer['rows'] = $rows;
	
	$res = $db->query("SELECT FOUND_ROWS()");
	$res = $res->fetch_array(MYSQLI_ASSOC);
	$answer['total'] = $res["FOUND_ROWS()"];

	$answer['success'] = !$error;
	return $answer;
};

$list = function($req) {
	$error = false;
	$db = get_db_connection();
	
	if ( array_key_exists('key', $req) ) {
		$key = $req['key'];
	} else {
		$key = "";
	}
	
	if ( array_key_exists('cat', $req) ) {
		$cat = $req['cat'];
	} else {
		$cat = "";
	}
	
	$query = "	SELECT * FROM `ad_v`
				WHERE
					description LIKE '%".$key."%' AND
					categories LIKE '%".$cat."%'";
	$res = $db->query($query) or die ("sql error");

	$rows = [];
	while ( $order = $res->fetch_array(MYSQLI_ASSOC) ) {
		$rows[] = $order;
	}
	$answer['rows'] = $rows;
	
	$res = $db->query("SELECT FOUND_ROWS()");
	$res = $res->fetch_array(MYSQLI_ASSOC);
	$answer['total'] = $res["FOUND_ROWS()"];

	$answer['success'] = !$error;
	return $answer;
};

$add_fav = function($req) {
	$error = false;
	$db = get_db_connection();
	
	if (! array_key_exists('user', $req) ) {
		$answer['success'] = false;
		$answer['error'] = "user is undefined";
		return $answer;
	} 
	
	if (! array_key_exists('id', $req) ) {
		$answer['success'] = false;
		$answer['error'] = "id is undefined";
		return $answer;
	} 
	$query = "INSERT INTO  `campus`.`favorite` (`aid` , `uid`)
	VALUES ('".$req['id']."',  '".$req['user']."');";
	
	$res = $db->query($query) or die ("sql error");

	$answer['success'] = $res;
	return $answer;
};

$confirm = function($req) {
	$error = false;
	$db = get_db_connection();
	
	if (! array_key_exists('id', $req) ) {
		$answer['success'] = false;
		$answer['error'] = "id is undefined";
		return $answer;
	} 
	$query = "UPDATE `campus`.`ad` SET `checked` = '1' WHERE `ad`.`id` = ".$req['id'].";";
	
	$res = $db->query($query) or die ("sql error");

	$answer['success'] = $res;
	return $answer;
};

$delete = function($req) {
	$error = false;
	$db = get_db_connection();
	
	if (! array_key_exists('id', $req) ) {
		$answer['success'] = false;
		$answer['error'] = "id is undefined";
		return $answer;
	}
	$query = "DELETE FROM `campus`.`ad` WHERE `ad`.`id` = ".$req['id'].";";
	
	$res = $db->query($query) or die ("sql error");

	$answer['success'] = $res;
	return $answer;
};

$create = function($req) {
	$error = false;
	$db = get_db_connection();
	if (! array_key_exists('description', $req) ) {
		$answer['success'] = false;
		$answer['error'] = "description is undefined";
		return $answer;
	} 	
	if (! array_key_exists('owner', $req) ) {
		$answer['success'] = false;
		$answer['error'] = "owner is undefined";
		return $answer;
	} 
	if (! array_key_exists('location', $req) ) {
		$answer['success'] = false;
		$answer['error'] = "location is undefined";
		return $answer;
	} 

	$query = "BEGIN;";
	$res = $db->query($query) or die ("error on BEGIN");
	
	$query = "INSERT INTO `campus`.`ad` (`id`, `description`, `owner`, `checked`, `ts`, `location`) VALUES (NULL, '".$req['description']."', '".$req['owner']."', '0', CURRENT_TIME(), '".$req['location']."');";
	$res = $db->query($query) or die ("error on ");
	
	$query = "SET @LAST_ID = LAST_INSERT_ID();";
	$res = $db->query($query) or die ("error on SET @LAST_ID");
	
	if (array_key_exists('photo', $req) ) {
		$query = "INSERT INTO `campus`.`photo` (`id`, `path`, `ad`) VALUES (NULL, '".$req['photo']."', @LAST_ID);";
		$res = $db->query($query) or die ("error on INSERT INTO photo");
	}
	
	if (array_key_exists('category', $req) ) {
		$query = "INSERT INTO `campus`.`ad_cat` (`ad`, `cat`) VALUES";
		foreach ($req['category'] as $category) {
			$query .= " (@LAST_ID, '".$category."'),";
		}
		$query = rtrim($query, ",") . ";";
		$res = $db->query($query) or die ("error on INSERT INTO ad_cat");
	} 
	
	$query = "COMMIT;";
	$res = $db->query($query) or die ("error on COMMIT");
	
	$query = "SELECT @LAST_ID AS id;";
	$res = $db->query($query) or die ("error on SELECT @LAST_ID");
	$res = $res->fetch_array(MYSQLI_ASSOC);
	$answer['success'] = true;
	$answer['id'] = $res["id"];
	return $answer;
};


$handlers = [
	'create' => $create,
	'confirm' => $confirm,
	'delete' => $delete,
	'mine' => $mine,
	'list' => $list,
	'add_fav' => $add_fav
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