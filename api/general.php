<?php

$hour = 60*60;
session_start();
if ( !array_key_exists('login', $_SESSION) ) {
	$_SESSION['login'] = 'guest';
	$_SESSION['role'] = 'guest';
	$_SESSION['id'] =  '-1';
	$_SESSION['home'] = '0';
}

function update_cookie(){
	setcookie('login',	$_SESSION['login'], time() + $hour, "/campus/");
	setcookie('role',	$_SESSION['role'], 	time() + $hour, "/campus/");
	setcookie('id',		$_SESSION['id'], 	time() + $hour, "/campus/");
	setcookie('home',	$_SESSION['home'],  time() + $hour, "/campus/");
}

function get_json(){
	$request = file_get_contents('php://input');
	return (array)json_decode($request);
}

function get_db_connection(){
	$db_user = 'root';
	$db_pass = '';
	$db_host = '127.0.0.1';
	$db_name = 'campus';
	$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	$connection->query('SET NAMES utf8');
	return $connection;
}

function create_constraint($db, $constraint) {
	$query = "";
	if ( !empty($constraint) ) {
		$query .= " WHERE";
		foreach ($constraint as $key => $value) {
			$query .= " " . 
			mysqli_real_escape_string($db, $key) . " = '" . 
			mysqli_real_escape_string($db, $value) . "' AND ";
		}
		$query = rtrim($query, "AND ");
	}
	return $query;
}

function create_extended_constraint($db, $union, $constraint, $or) {
	$query = "";
	if ( !empty($constraint) OR !empty($union) OR !empty($or) ) {
		$query .= " WHERE";
		if ( !empty($union) ) {
			foreach ($union as $key => $value) {
				$query .= " " . 
				mysqli_real_escape_string($db, $key) . " = " . 
				mysqli_real_escape_string($db, $value) . " AND ";
			}
		}

		if ( !empty($constraint) ) {
			foreach ($constraint as $key => $value) {
				$query .= " " . 
				mysqli_real_escape_string($db, $key) . " = '" . 
				mysqli_real_escape_string($db, $value) . "' AND ";
			}
		}

		if ( !empty($or) ) {
			$query .= " (";
			foreach ($or as $key => $value) {
				$query .= " " .
				mysqli_real_escape_string($db, $value) . " = '" .
				mysqli_real_escape_string($db, $key) . "' OR";
			}
			$query = rtrim($query, "OR ");
			$query .= ")";
		} 
		else {
			$query = rtrim($query, "AND ");
		}

	}
	return $query;
}

function create_sort($db, $sort) {
	$query = "";
	if ( !empty($sort) ) {
		$query .= " ORDER BY";
		foreach ($sort as $key => $value) {
			$query .= " " . 
			mysqli_real_escape_string($db, $key) . " " . 
			mysqli_real_escape_string($db, $value) . ", ";
		}
		$query = rtrim($query, ", ");
	}
	return $query;
}

function create_limit($db, $from, $count) {
	$query = "";
	if ( !empty($count) AND $count != '-1') {
		$query .= " LIMIT " . 
			mysqli_real_escape_string($db, $from) . ", " .
			mysqli_real_escape_string($db, $count);
	}
	return $query;
}


function create_delete($db, $table_name, $constraint){
	$query = "DELETE FROM " . mysqli_real_escape_string($db, $table_name) . " ";
	$query .= create_constraint($db, $constraint);
	return $query;
}

function create_update($db, $table_name, $set, $constraint) {
	$query = "UPDATE " . mysqli_real_escape_string($db, $table_name) . " SET ";
	foreach ($set as $key => $value) {
		$query .= " " . 
			mysqli_real_escape_string($db, $key) . " = '" . 
			mysqli_real_escape_string($db, $value) . "', ";
	}
	$query = rtrim($query, ", ");
	$query .= create_constraint($db, $constraint) . ";";
	return $query;
}

function create_insert($db, $table_name, $set) {
	$query = "INSERT INTO " . mysqli_real_escape_string($db, $table_name) . "(";
	$value = "VALUES(";
	foreach ($set as $key => $val) {
		$query .= mysqli_real_escape_string($db, $key) . ", " ;
		$value .= "'" . mysqli_real_escape_string($db, $val) . "', ";
	}
	$query = rtrim($query, ", ") . ") ";
	$value = rtrim($value, ", ") . ") ";
	return $query . $value . ";";
}

function create_select($db, $table_name, $val, $constraint){
	$query = "SELECT ";
	foreach ($val as $key => $name) {
		$query .= " " . 
			mysqli_real_escape_string($db, $key) . " as '" . 
			mysqli_real_escape_string($db, $name) . "', ";
	}
	$query = rtrim($query, ", ");
	$query .= " FROM " . mysqli_real_escape_string($db, $table_name) ;
	$query .= create_constraint($db, $constraint) . ";";
	return $query;
}

function get_request_type(){
	$req = get_json();
	if ( !array_key_exists('type', $req) ){
		die("type not set!");
	}
	return $req['type'];
}

function create_extended_select($db, $table, $val, $union, $constraint, $or, $sort, $flag, $from, $count){
	$query = "SELECT " . $flag . " ";
	foreach ($val as $key => $name) {
		$query .= " " . 
			mysqli_real_escape_string($db, $key) . " as '" . 
			mysqli_real_escape_string($db, $name) . "', ";
	}
	$query = rtrim($query, ", ");
	$query .= " FROM ";
	foreach ($table as $key => $name) {
		$query .= 
			mysqli_real_escape_string($db, $name) . " as " .
			mysqli_real_escape_string($db, $key) . ", ";
	}
	$query = rtrim($query, ", ");
	$query .= create_extended_constraint($db, $union, $constraint, $or) . 
			create_sort($db, $sort) . 
			create_limit($db, $from, $count) . 
			";";
	return $query;
}

function base64_to_img($base64, $output) {
    $ifp = fopen($output, "wb"); 
    $data = explode(',', $base64);
    fwrite($ifp, base64_decode($base64)); 
    fclose($ifp); 
}

update_cookie();