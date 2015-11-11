<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>.: ПОРТАЛ ОБЩЕЖИТИЯ НИЯУ МИФИ :. </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="CSS/bootstrap.css" rel="stylesheet">
	<link href="CSS/content.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<!-- ... -->

	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/moment-with-locales.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
	<link rel="stylesheet" href="CSS/bootstrap.min.css" />
	<link rel="stylesheet" href="CSS/bootstrap-datetimepicker.min.css" />
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			</button>
			<a style="color: whitesmoke;" class="navbar-brand" href="index.html">Портал общежития НИЯУ МИФИ</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-left">
				<li><a style="color: whitesmoke" href="index.php">ГЛАВНАЯ</a></li>
				<li><a style="color: whitesmoke" href="dashboard.php">ДОСКА ОБЪЯВЛЕНИЙ</a></li>
				<li><a style="color: whitesmoke" href="services.php">УСЛУГИ</a></li>
			</ul>
			<?php
                include("/lib/log.php");
            ?>	
		</div>
	</div>
</nav>
<div class="container">
	<div class="span3">
		<?php     
			if ($user_data['role'] == 'admin' or $user_data['role'] == 'manage' or $user_data['role'] == 'moder') {
				echo "<h1>Все заявки на услуги:</h1>";
				$query = "SELECT id, owner, description, serv, ordate, timeint, state, ts,
							(SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
							(SELECT name FROM service WHERE id = serv) as category,
							(SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
								FROM address, users
								WHERE users.id = owner AND home = address.id) as address
							FROM orders
							ORDER BY ts DESC" 
							or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
			}
			if ($user_data['role'] == 'staff') {
				echo "<h1>Ваши заявки на услуги:</h1>";
				$query = "SELECT id, owner, description, serv, ordate, timeint, state, ts,
							(SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
							(SELECT name FROM service WHERE id = serv) as category,
							(SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
								FROM address, users
								WHERE users.id = owner AND home = address.id) as address
							FROM orders
							ORDER BY ts DESC" 
							or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
			}
			if ($user_data['role'] == 'campus') {
				echo "<h1>Мои заявки на услуги:</h1>";
				$query = "SELECT id, owner, description, serv, ordate, timeint, state, ts,
							(SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
							(SELECT name FROM service WHERE id = serv) as category,
							(SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
								FROM address, users
								WHERE users.id = owner AND home = address.id) as address
							FROM orders
							WHERE owner = " .$user_data['id'].
							" ORDER BY ts DESC" 
							or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
			}
			$result = $link->query($query);
			$ord_data = mysqli_fetch_array($result);			
			echo ('<div id="content">');
			switch ($ord_data['timeint']) {
				case 1: $timeint = "9:00-9:45"; break;
				case 2: $timeint = "10:00-10:45"; break;
				case 3: $timeint = "11:00-11:45"; break;
				case 4: $timeint = "12:00-10:45"; break;
				case 5: $timeint = "14:00-14:45"; break;
				case 6: $timeint = "15:00-15:45"; break;
				case 7: $timeint = "16:00-16:45"; break;
				case 8: $timeint = "17:00-17:45"; break;
			}
			
			do {
				echo ('<div style="background-color:white" class="sector">

							<p>Категория: '.$ord_data['category']."</p>\n"
							."<p>Описание: ".$ord_data['description']."</p>\n"
							."<p>Дата и время обслуживания: ".$ord_data['ordate']." ".$timeint."</p>\n"
							."<p>Адрес: ".$ord_data['address']."</p>\n"
							."<p>Автор заявки: ".$ord_data['author']."</p>\n"
							."<p>Дата и время добавления заявки: ".$ord_data['ts']."</p>\n"
							."<p>Состояние заказа: ".$ord_data['state']."</p>\n"
							
						);
					//echo ('<a href="services.php?inv='.$ord_data['id'].'" class="button danger" style="text-align:center;">Удалить</a><br><br>');

				echo ('</div>');
			} while ($ord_data=mysqli_fetch_array($result));
			echo ('</div>');
		?>
		</div>
	</div>
</body>
</html>