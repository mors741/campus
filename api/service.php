<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("general.php");

function get_user($req) {
	$db = get_db_connection();
	if ( array_key_exists('login', $req) ) {
		$where = ['login' => $req['login']];
	}
	else {
		$where = ['id' => $req['id']];
	}
	$select = [
		'id' => 'id',
		'login' => 'login',
		'fio' => 'fio',
		'address' => 'address',
	];
	$query = create_select($db, 'users_fio', $select , $where); 
	$res = $db->query($query);
	$res = $res->fetch_array(MYSQLI_ASSOC);
	return $res;
}

$create = function($req) {
	$ans = [];
	$error = false;
	$db = get_db_connection();
	$mandatory = ['login', 'performer_id', 'category_id', 'description', 'ordate', 'timeint'];
	foreach ($mandatory as $field) {
		if ( !array_key_exists($field, $req) ) {
			$error = true;
		}
	}

	if ( !$error ) {
		$request = [
			'owner' => get_user($req)['id'],
			'performer' => $req['performer_id'],
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

$get_orders = function($req) {
	$ans = [];
	$error = false;
	$db = get_db_connection();

	$author_id =  get_user($req)['id'];
	$where = [
		'author_id' => $author_id,
	];

	$select = [
		'id' => 'id',
		'category' => 'category',
		'description' => 'description',
		'ordate' => 'ordate',
		'timeint' => 'timeint',
		'date_create' => 'date_create',
		'state' => 'state',
		'mark' => 'mark',
		'performer_id' => 'performer_id',
	];

	$query = create_select($db, 'orders_full', $select, $where);
	$res = $db->query($query);

	while ( $order = $res->fetch_array(MYSQLI_ASSOC) ) {
		$performer = get_user(['id' => $order['performer_id']]);
		if ( empty($performer) ) {
			$error = true;
		}
		$order = array_merge($order, ['performer' => $performer['fio']]);
		unset($order['performer_id']);
		$ans[] = $order;
	}
	$ans['success'] = !$error;
	return $ans;
};

$get_work = function($req) {
	$ans = [];
	$error = false;
	$db = get_db_connection();

	$where = [];
	if ( array_key_exists('login', $req) ) {
		$where['performer_id'] = $get_user($req)['id'];
	}

	if ( array_key_exists('mark', $req) ) {
		$where['mark'] = $req['mark'];
	}

	if ( array_key_exists('ordate', $req) ) {
		$where['ordate'] = $req['ordate'];
	}

	$select = [
		'id' => 'id',
		'author_id' => 'author_id',
		'description' => 'description',
		'ordate' => 'ordate',
		'timeint' => 'timeint',
		'date_create' => 'date_create',
		'state' => 'state',
		'mark' => 'mark',
		'comment' => 'comment',
		'performer_id' => 'performer_id'
	];

	$query = create_select($db, 'orders_full', $select, $where);
	$res = $db->query($query);

	while ( $order = $res->fetch_array(MYSQLI_ASSOC) ) {
		$performer = get_user(['id' => $order['performer_id']]);
		if ( empty($performer) ) {
			$error = true;
		}
		$order = array_merge($order, ['performer' => $performer['fio']]);
		unset($order['performer_id']);

		$author = get_user(['id' => $order['author_id']]);
		if ( empty($author) ) {
			$error = true;
		}
		$order = array_merge($order, ['author' => $author['fio'], 'address' => $author['address']]);
		unset($order['author_id']);

		$ans[] = $order;
	}
	$ans['success'] = !$error;
	return $ans;
};

$get_rating = function($req) {
	$ans = [];
	$error = false;
	$db = get_db_connection();

	$where = [];
	if ( array_key_exists('login', $req) ) {
		$where['uid'] = get_user($req)['id'];
	}

	$select = [
		'id' => 'id',
		'uid' => 'uid',
		'sid' => 'sid',
		'rating' => 'rating',
	];

	$query = create_select($db, 'staff', $select, $where);
	$res = $db->query($query);

	while ( $staff = $res->fetch_array(MYSQLI_ASSOC) ) {
		$performer = get_user(['id' => $staff['uid']]);
		if ( empty($performer) ) {
			$error = true;
		}
		$staff = array_merge($staff, ['performer' => $performer['fio']]);
		unset($staff['uid']);

		$query = create_select($db, 'service', ['name' => 'category'], ['id' => $staff['sid']]);
		$category = $db->query($query);
		$category = $category->fetch_array(MYSQLI_ASSOC);
		if ( empty($category) ) {
			$error = true;
		}
		$staff = array_merge($staff, $category);
		unset($staff['sid']);	
		$ans[] = $staff;
	}
	$ans['success'] = !$error;
	return $ans;
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

$get_needs = function($req) {
	$error = false;
	$db = get_db_connection();
	$answer['current'] = $req['current'];
	$answer['rowCount'] = $req['rowCount'];

	$author_id =  get_user($req)['id'];
	$where = [
		'author_id' => $author_id,
	];

	$select = [
		'id' => 'id',
		'category' => 'category',
		'description' => 'description',
		'ordate' => 'ordate',
		'timeint' => 'timeint',
		'date_create' => 'date_create',
		'state' => 'state',
		'mark' => 'mark',
		'performer_id' => 'performer_id',
	];

	$query = create_select($db, 'orders_full', $select, $where);
	$query = added_sort($db, $query, $req);
	$query = added_limit($db, $query, $req);
	$query = added_total($db, $query, $req);
	$res = $db->query($query);

	$rows = [];
	while ( $order = $res->fetch_array(MYSQLI_ASSOC) ) {
		$performer = get_user(['id' => $order['performer_id']]);
		if ( empty($performer) ) {
			$error = true;
		}
		$order = array_merge($order, ['performer' => $performer['fio']]);
		unset($order['performer_id']);
		$rows[] = $order;
	}
	$answer['rows'] = $rows;
	
	$res = $db->query("SELECT FOUND_ROWS()");
	$res = $res->fetch_array(MYSQLI_ASSOC);
	$answer['total'] = $res["FOUND_ROWS()"];

	$answer['success'] = !$error;
	return $answer;
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

	$where = [];
	if ( array_key_exists('author_id', $req) ) {
		$where['a.id'] = $req['author_id'];
	}
	if ( array_key_exists('performer_id', $req) ) {
		$where['p.id'] = $req['performer_id'];
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

	$query = create_extended_select($db, $table, $select, $union, $where, $sort, $flag, $from, $count);
	$res = $db->query($query);
	$rows = [];
	while ( $order = $res->fetch_array(MYSQLI_ASSOC) ) {
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

$get_tasks = function($req) {
	$error = false;
	$db = get_db_connection();
	$answer['current'] = $req['current'];
	$answer['rowCount'] = $req['rowCount'];

	$where = [];
	if ( array_key_exists('login', $req) ) {
		$where['performer_id'] = get_user($req)['id'];
	}

	if ( array_key_exists('mark', $req) ) {
		$where['mark'] = $req['mark'];
	}

	if ( array_key_exists('ordate', $req) ) {
		$where['ordate'] = $req['ordate'];
	}

	$select = [
		'id' => 'id',
		'author_id' => 'author_id',
		'description' => 'description',
		'ordate' => 'ordate',
		'timeint' => 'timeint',
		'date_create' => 'date_create',
		'state' => 'state',
		'mark' => 'mark',
		'comment' => 'comment',
		'performer_id' => 'performer_id'
	];

	$query = create_select($db, 'orders_full', $select, $where);
	$query = added_sort($db, $query, $req);
	$query = added_limit($db, $query, $req);
	$query = added_total($db, $query, $req);
	$res = $db->query($query);

	$rows = [];
	while ( $order = $res->fetch_array(MYSQLI_ASSOC) ) {
		$performer = get_user(['id' => $order['performer_id']]);
		if ( empty($performer) ) {
			$error = true;
		}
		$order = array_merge($order, ['performer' => $performer['fio']]);
		unset($order['performer_id']);

		$author = get_user(['id' => $order['author_id']]);
		if ( empty($author) ) {
			$error = true;
		}
		$order = array_merge($order, ['author' => $author['fio'], 'address' => $author['address']]);
		unset($order['author_id']);

		$rows[] = $order;
	}
	$answer['rows'] = $rows;
	
	$res = $db->query("SELECT FOUND_ROWS()");
	$res = $res->fetch_array(MYSQLI_ASSOC);
	$answer['total'] = $res["FOUND_ROWS()"];

	$answer['success'] = !$error;
	return $answer;
};


$handlers = [
	'create' => $create,
	'set_state' => $set_state,
	'get_orders' => $get_orders,
	'get_work' => $get_work,
	'get_rating' => $get_rating,
	'delete' => $delete,
	'get_needs' => $get_needs,
	'get_tasks' => $get_tasks,
	'get_data' => $get_data,
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