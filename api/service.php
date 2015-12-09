<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("general.php");

$create = function($req) {
	$ans = [];
	$error = false;
	$db = get_db_connection();
	$mandatory = ['id', 'category_id', 'description', 'ordate', 'timeint'];
	foreach ($mandatory as $field) {
		if ( !array_key_exists($field, $req) ) {
			$error = true;
		}
	}

	if ( !$error ) {
		$request = [
			'owner' => $req['id'],
			'description' => $req['description'],
			'serv' => $req['category_id'],
			'ordate' => $req['ordate'],
			'timeint' => $req['timeint'],
			'date_create' => date("Y-m-d H:i:s"),
		];

		$query = create_insert($db, 'orders', $request);
		
		$res = $db->query($query);
		if ( $res == false ) {
			$error = true;
		} 
	}

	$ans['success'] = !$error; 
	return $ans; 
};

$set_state = function($req) {
	$ans = [];
	$error = false;
	$db = get_db_connection();
	
	$id = $req['id'];

	$set = [];
	$mandatory = ['state', 'mark', 'comment'];
	foreach ($mandatory as $field) {
		if ( array_key_exists($field, $req) ) {
			$set[$field] = $req[$field];
		}
	}

	$query = create_update($db, 'orders', $set, ['id' => $id]);
	$res = $db->query($query);
	if ( $res == false ) {
		$error = true;
	}
	$ans['success'] = !$error;
	return $ans;
};

$get_rating = function($req) {
	$db = get_db_connection();

	$flag = "SQL_CALC_FOUND_ROWS";

	$table = [
		'u' => 'users_fio',
		'p' => 'service',
		's' => 'staff',
	];

	$select = [
		'u.fio' => 'performer',
		'p.name' => 'post',
		's.rating' => 'rating',
	];

	$union = [
		'u.id' => 's.uid',
		'p.id' => 's.sid',
	];

	$or = [];

	$where = [];
	if ( array_key_exists('performer_id', $req) ) {
		$where['s.uid'] = $req['performer_id'];
	}

	$sort = (array) $req['sort'];

	$from = ($req['current'] - 1) * $req['rowCount'];

	$count = $req['rowCount'];

	$query = create_extended_select($db, $table, $select, $union, $where, $or, $sort, $flag, $from, $count);
	$res = $db->query($query);
	$rows = [];
	while ( $staff = $res->fetch_array(MYSQLI_ASSOC) ) {
		$rows[] = $staff;
	}

	$res = $db->query("SELECT FOUND_ROWS()");
	$total = $res->fetch_array(MYSQLI_ASSOC);
	$total = $total["FOUND_ROWS()"];

	$answer['rows'] = $rows;
	$answer['total'] = $total;
	$answer['current'] = $req['current'];
	$answer['rowCount'] = $req['rowCount'];
	return $answer;
};

$delete = function($req) {
	$ans = [];
	$error = false;
	$db = get_db_connection();

	$id = $req['id'];
	$query = create_delete($db, 'orders', ['id' => $id]);
	$res = $db->query($query);
	if ( $res == false ) {
		$error = true;
	}
	$ans['success'] = !$error;
	return $ans;
};

$get_data = function($req) {
	$db = get_db_connection();

	$flag = 'SQL_CALC_FOUND_ROWS';

	$table = [
		'o' => 'orders_full',
		'a' => 'users_fio',
		'p' => 'users_fio',
	];

	$select = [
		'o.id' => 'id',
		'a.fio' => 'author',
		'a.address' => 'address',
		'o.description' => 'description',
		'o.ordate' => 'ordate',
		'o.timeint' => 'timeint',
		'o.date_create' => 'date_create',
		'o.state' => 'state',
		'o.mark' => 'mark',
		'o.comment' => 'comment',
		'p.fio' => 'performer',
		'o.category' => 'category',
	];

	$union = [
		'o.author_id' => 'a.id',
		'o.performer_id' => 'p.id',
	];
	$or = [];

	$where = [];
	if ( array_key_exists('author_id', $req) ) {
		$where['a.id'] = $req['author_id'];
	}
	if ( array_key_exists('performer_id', $req) ) {
		if ( $req['performer_id'] != "-1" ) {
			$where['p.id'] = $req['performer_id'];
		}
		$or = [
			'Ожидает выполнения' => 'o.state',
			'Просрочено' => 'o.state',
			'Жалоба' => 'o.state',
		];
	}
	if ( array_key_exists('mark', $req) ) {
		$where['o.mark'] = $req['mark'];
	}
	if ( array_key_exists('ordate', $req) ) {
		$where['o.ordate'] = $req['ordate'];
	}

	$sort = (array) $req['sort'];

	$from = ($req['current'] - 1) * $req['rowCount'];

	$count = $req['rowCount'];

	$query = create_extended_select($db, $table, $select, $union, $where, $or, $sort, $flag, $from, $count);
	$res = $db->query($query);
	$rows = [];
	while ( $order = $res->fetch_array(MYSQLI_ASSOC) ) {
		if ($order['mark'] == 1) { // red row
			$order['status'] = 3;
		} 
		else if ($order['mark'] == 2) { // yellow row
			$order['status'] = 2;
		}
		$rows[] = $order;
	}

	$res = $db->query("SELECT FOUND_ROWS()");
	$total = $res->fetch_array(MYSQLI_ASSOC);
	$total = $total["FOUND_ROWS()"];

	$answer['rows'] = $rows;
	$answer['total'] = $total;
	$answer['current'] = $req['current'];
	$answer['rowCount'] = $req['rowCount'];
	return $answer;
};



$get_free_time = function($req) {
	$ans = [];
	$mandatory = ['sid', 'date'];
	$times = [
	1 => 0,	2 => 0, 3 => 0, 4 => 0,
	5 => 0, 6 => 0, 7 => 0, 8 => 0,
	];
	foreach ($mandatory as $field) {
		if ( !array_key_exists($field, $req) ) {
			$ans['error'] = 'mandatory field missing';
			$ans['success'] = false;
			return $ans;
		}
	}

	$db = get_db_connection();
	$query = "SELECT timeint as 'time', count(1) AS 'load' FROM orders WHERE serv = %d AND ordate = '%s' GROUP BY timeint;";
	$query = sprintf($query, $req['sid'], $req['date']);
	$m_query = "SELECT count(1) as max FROM staff WHERE sid = %d AND exp is NULL;";
	$m_query = sprintf($m_query, $req['sid']);
	
	$res = $db->query($query);
	$m_res = $db->query($m_query);
	
	if ( $res == false or $m_res == false) {
		$ans['success'] = true;
		$ans['error'] = 'sql';
	} else {
		$ans['state'] = [];
		$ans['success'] = true;
		$max = $m_res->fetch_array(MYSQLI_ASSOC);
		while ( $row = $res->fetch_array(MYSQLI_ASSOC) ) {
			$times[intval($row['time'])] = intval($row['load']);
		}
		foreach ( $times as $time => $load ) {
			$ans['state'][$time] = ($load < $max['max']);
		}
	}
	return $ans;
};

$handlers = [
	'create' => $create,
	'set_state' => $set_state,
	'get_rating' => $get_rating,
	'delete' => $delete,
	'get_data' => $get_data,
	'get_free_time' => $get_free_time,
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