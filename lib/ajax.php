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

function create_update($db, $table_name, $set, $constraint) {
	$query = "UPDATE " . mysqli_real_escape_string($db, $table_name) . " SET ";
	foreach ($set as $key => $value) {
		$query .= " " . 
			mysqli_real_escape_string($db, $key) . " = " . 
			mysqli_real_escape_string($db, $value) . ", ";
	}
	$query = rtrim($query, ", ");
	$query .= " WHERE";
	foreach ($constraint as $key => $value) {
		$query .= " " . 
			mysqli_real_escape_string($db, $key) . " = " . 
			mysqli_real_escape_string($db, $value) . ", ";
	}
	$query = rtrim($query, ", ");
	$query .= ";";
	
	return $query;
}

$update_rating = function($req){
	$db = get_db_connection();
	$row_id = $req['row_id'];
	$rating = $req['rating'];

	$query = create_update($db, 'orders', ['mark' => $rating], ['id' => $row_id]);
	$res = $db->query($query);
	
	$answer = [
		'status' => 'OK',
		'msg' => 'Спасибо. Ваш голос учтен',
	];
	print(json_encode($answer));
};


// get req type
// map to hander
$handers = [
	'update_rating' => $update_rating, 
];


$req = get_json();
if ( !array_key_exists('type', $req) ){
	die("type not set!");
}

if ( !array_key_exists($req['type'], $handers) ) {
	die("no handelr for type : " . $req['type'] );
}

$handers[$req['type']]($req);
