<?php

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
	return $connection;
}

function create_constraint($db, $constraint) {
	$query = "";
	if ( !empty($constraint) ) {
		$query .= " WHERE";
		foreach ($constraint as $key => $value) {
			$query .= " " . 
			mysqli_real_escape_string($db, $key) . " = '" . 
			mysqli_real_escape_string($db, $value) . "', ";
		}
		$query = rtrim($query, ", ");
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

