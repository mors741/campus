<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>.: ПОРТАЛ ОБЩЕЖИТИЯ НИЯУ МИФИ :. </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link rel="stylesheet" type="text/css" href="CSS/dropdown.css" />	
	<link href="CSS/bootstrap.css" rel="stylesheet">
	<link href="CSS/content.css" rel="stylesheet">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
	<link rel="stylesheet" href="CSS/bootstrap-datetimepicker.min.css" />
	<!-- ... -->

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			</button>
			<a style="color: whitesmoke;" class="navbar-brand" href="index.php">Портал общежития НИЯУ МИФИ</a>
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

	<div class="row" style="width: 210%">
		<div class="col-md-6">
			<div class="card">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Личная информация</a></li>
					<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Редактировать</a></li>
					<li role="presentation"><a href="#privacySettings" aria-controls="privacySettings" role="tab" data-toggle="tab">Настройки приватности</a></li>
					<?php if ($user_data['role'] != 'local') {
						echo '<li role="presentation"><a href="#services" aria-controls="services" role="tab" data-toggle="tab">Заявки</a></li>';
					}?>
					<li role="presentation"><a href="#favourites" aria-controls="favourites" role="tab" data-toggle="tab">Закладки</a></li>
					<?php if ($user_data['role'] != 'staff') {
						echo '<li role="presentation"><a href="#myAds" aria-controls="myAds" role="tab" data-toggle="tab">Мои объявления</a></li>';
					}?>
					<?php if ($user_data['role'] == 'moder') {
						echo '<li role="presentation"><a href="#tools" aria-controls="tools" role="tab" data-toggle="tab">Инструменты модератора</a></li>';
					}
					if ($user_data['role'] == 'admin') {
						echo '<li role="presentation"><a href="#tools" aria-controls="tools" role="tab" data-toggle="tab">Инструменты администратора</a></li>';
					}?>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="home">
							<div class="container">
								<div class="row">
									<div class="col-sm-2 col-md-2">
										<br/><img src="Pictures/images.jpg"
											 alt="" class="img-rounded img-responsive" />
									</div>
									<div class="col-sm-4 col-md-4">
										<p> <br/><label for="login">E-Mail: </label> <?php echo $user_data['login'] ?>
											<br/><label for="name">Имя:</label> <?php echo $user_data['name'] ?>
											<?php if ($user_data['patronymic'] != '') {
												echo '<br/><label for="patronymic">Отчество: </label> ';
												echo $user_data['patronymic'];
											}?>
											<br/><label for="surname">Фамилия: </label> <?php echo $user_data['surname'] ?>
											<?php if ($user_data['role'] == 'staff') {
												echo '<br/><label for="post">Должность: </label> ';
												echo $user_data['post'];
											}?>
											<?php if ($user_data['gender'] != '') {
												echo '<br/><label for="gender">Пол: </label> ';
												echo " ";
												echo $user_data['gender'];
											}?>
											<?php if ($user_data['bdate'] != '') {
												echo '<br/><label for="bdate">Дата рождения: </label> ';
												echo $user_data['bdate'];
											}?>
											<?php if ($user_data['contacts'] != '') {
												echo '<br/><label for="contacts">Контакты: </label> ';
												echo $user_data['contacts'];
											}?>
											<?php if ($user_data['home'] != 0) {
												echo '<br/><label for="address">Корпус: </label> ';
												echo $user_data['home'];
											}?>
											<?php if ($user_data['room'] != 0) {
												echo '<br/><label for="room">Комната: </label> ';
												echo $user_data['room'];
											}?>
										</p>
									</div>
								</div>
							</div>
						</div>
					<div role="tabpanel" class="tab-pane" id="settings">
						<div class="container">
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<br/><img src="Pictures/images.jpg"
											  alt="" class="img-rounded img-responsive" />
									<form action="" method="post" enctype="form-data" id="js-upload-form" >
										<div class="control-group form-group">
											<br/><div class="form-group">
												<input type="file"  id="js-upload-files">
											</div>
											<button type="submit"  id="js-upload-submit" class="btn btn-default">Загрузить</button>
										</div>
									</form>
								</div>
								<div class="col-sm-8 col-md-6">
									<div class="control-group form-group">
										<br/><label for="password">Старый пароль</label>
										<div class="form-group">
											<input type="password" id="password" class="form-control"  placeholder="Старый пароль"/>
										</div>
									</div>
									<div class="control-group form-group">
										<label for="password">Новый пароль</label>
										<div class="form-group">
											<input type="password" id="password" class="form-control"  placeholder="Новый пароль"/>
										</div>
									</div>
									<div class="control-group form-group">
										<label for="name">Имя</label>
										<div class="form-group">
											<input type="text" id="name" class="form-control"  placeholder="Имя"/>
										</div>
									</div>
									<div class="control-group form-group">
										<label for="patronymic">Отчество</label>
										<div class="form-group">
											<input id="patronymic" class="form-control" placeholder="Отчество"/>
										</div>
									</div>
									<div class="control-group form-group">
										<label for="surname">Фамилия</label>
										<div class="form-group">
											<input id="surname" class="form-control" placeholder="Фамилия"/>
										</div>
									</div>

									<?php if ($user_data['role'] != 'local' && $user_data['role' != 'campus']) {
										echo <<< EOT
										<div class="control-group form-group">
											<label for="post">Должность</label>
											<div class="form-group">
												<input id="post" class="form-control" placeholder="Должность"/>
											</div>
										</div>
EOT;
									}?>
									<?php if ($user_data['role'] == 'local' || $user_data['role'] == 'campus') {
									echo <<< EOT
									<div class="control-group form-group">
										<label for="patronymic">Пол</label>
										<div class="controls">
											<select id="gender" class="form-control">
												<option value="" selected="selected">(Укажите свой пол)</option>
												<option value="М">М</option>
												<option value="Ж">Ж</option>
											</select>
										</div>
									</div>
									<div class="control-group form-group">
										<label for="birthday">Дата рождения</label>
										<div class="form-group">
											<div class="input-group date" id="datetimepicker1">
												<input type="text" class="form-control" />
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
										</div>
									</div>
EOT;
									}?>
									<div class="control-group form-group">
										<label for="contact">Контакты</label>
										<div class="form-group">
											<input type="tel" id="contact" class="form-control" placeholder="Контакты"/>
										</div>
									</div>
									<?php if ($user_data['role'] != 'local') {
										echo <<< EOT
								    <div class="control-group">
										<label for="address">Адрес</label>
										<div class="controls">
											<select id="address" class="form-control">
												<option value="" selected="selected">(Выберите корпус общежития)</option>
												<option value="1">ул. Москворечье д.2 корп 1</option>
												<option value="2">ул. Москворечье д.2 корп 2</option>
												<option value="3">ул. Москворечье, д.19 корп 3</option>
												<option value="4">ул. Москворечье, д.19 корп 4</option>
												<option value="5">ул. Кошкина д.11 корп. 1</option>
												<option value="6">ул. Шкулева д.27 ст 2</option>
												<option value="8">ул. Пролетарский проспект д. 8 корп. 2</option>
											</select>
										</div>
									</div>
									<div class="control-group form-group">
										<br/><label for="room">Номер комнаты (квартиры)</label>
										<div class="form-group">
											<input type="range min=1 max=400" id="room" class="form-control" placeholder="Номер комнаты"/>
										</div>
									</div>
EOT;
									}?>
									<br/><button type="submit" class="btn btn-default">Сохранить изменения</button>
								</div>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="privacySettings">
						<div class="container">
							<br/><label>Выберите личные данные, которые вы хотите скрыть от просмотра другими пользователями</label>
							<div class="form-inline">
								<br/><label for="login">E-Mail</label>
								<label for="hide" style="margin-left: 200px"><input type="checkbox" value="">   Скрыть</label>
							</div>
							<div class="form-inline">
								<br/><label for="name">Имя</label>
								<label for="hide" style="margin-left: 214px"><input type="checkbox" value="">   Скрыть</label>
							</div>
							<div class="form-inline">
								<br/><label for="surname">Фамилия</label>
								<label for="hide" style="margin-left: 177px"><input type="checkbox" value="">   Скрыть</label>
							</div>
							<div class="form-inline">
								<br/><label for="birthday">Дата рождения</label>
								<label for="hide" style="margin-left: 136px"><input type="checkbox" value="">   Скрыть</label>
							</div>
							<div class="form-inline">
								<br/><label for="contact">Контакты</label>
								<label for="hide" style="margin-left: 178px"><input type="checkbox" value="">   Скрыть</label>
							</div>
							<div class="form-inline">
								<br/><label for="address">Адрес</label>
								<label for="hide" style="margin-left: 199px"><input type="checkbox" value="">   Скрыть</label>
							</div>
							<div class="form-inline">
								<br/><label for="room">Комната</label>
								<label for="hide" style="margin-left: 184px"><input type="checkbox" value="">   Скрыть</label>
							</div>
						</div>
					</div>
					<?php if ($user_data['role'] != 'local') {
						echo '<div role="tabpanel" class="tab-pane" id="services">';
						if ($user_data['role'] == 'admin' or $user_data['role'] == 'manage' or $user_data['role'] == 'moder') {
							echo "<h3><strong>Все заявки на услуги</strong></h3><br/>";
							$check_query = "SELECT count(id) as count,
										(SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
										(SELECT name FROM service WHERE id = serv) as category,
										(SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
											FROM address, users
											WHERE users.id = owner AND home = address.id) as address,
										(SELECT CONCAT(name,\" \", surname)
											FROM staff, users
											WHERE orders.performer = staff.id and staff.uid = users.id) as performer
										FROM orders
										ORDER BY date_create DESC" 
										or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
							$result = $link->query($check_query);
							$ord_data = mysqli_fetch_array($result);
							if ($ord_data['count'] == 0) { echo "Нет заявок"; } else {
								$query = "SELECT id, /*owner, performer,*/ description, serv, ordate, timeint, state, date_create,
										(SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
										(SELECT name FROM service WHERE id = serv) as category,
										(SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
											FROM address, users
											WHERE users.id = owner AND home = address.id) as address,
										(SELECT CONCAT(name,\" \", surname)
											FROM staff, users
											WHERE orders.performer = staff.id and staff.uid = users.id) as performer
										FROM orders
										ORDER BY date_create DESC" 
										or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
							}
						}
						if ($user_data['role'] == 'staff') {
							echo "<h3><strong>Заявки для выполнения</strong></h3><br/>";
							$check_query = "SELECT count(orders.id) as count,
										(SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
										(SELECT name FROM service WHERE id = serv) as category,
										(SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
											FROM address, users
											WHERE users.id = owner AND home = address.id) as address,
										(SELECT CONCAT(name,\" \", surname)
											FROM staff, users
											WHERE orders.performer = staff.id and staff.uid = users.id) as performer
										FROM orders, staff, users
										WHERE  orders.performer = staff.id and staff.uid = users.id and users.id = ".$user_data['id']."
										ORDER BY date_create DESC" 
										or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
							$result = $link->query($check_query);
							$ord_data = mysqli_fetch_array($result);
							if ($ord_data['count'] == 0) { echo "Нет заявок"; } else {
								$query = "SELECT orders.id as id, /*owner, performer,*/ description, serv, ordate, timeint, state, date_create,
											(SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
											(SELECT name FROM service WHERE id = serv) as category,
											(SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
												FROM address, users
												WHERE users.id = owner AND home = address.id) as address,
											(SELECT CONCAT(name,\" \", surname)
												FROM staff, users
												WHERE orders.performer = staff.id and staff.uid = users.id) as performer
											FROM orders, staff, users
											WHERE  orders.performer = staff.id and staff.uid = users.id and users.id = ".$user_data['id']."
											ORDER BY date_create DESC" 
											or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
							}
						}
						if ($user_data['role'] == 'campus') {
							echo "<h3><strong>Мои заявки на услуги</strong></h3><br/>";
							$check_query = "SELECT count(id) as count, 
										(SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
										(SELECT name FROM service WHERE id = serv) as category,
										(SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
											FROM address, users
											WHERE users.id = owner AND home = address.id) as address,
										(SELECT CONCAT(name,\" \", surname)
											FROM staff, users
											WHERE orders.performer = staff.id and staff.uid = users.id) as performer
										FROM orders
										WHERE owner = " .$user_data['id'].
										" ORDER BY date_create DESC" 
										or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
							$result = $link->query($check_query);
							$ord_data = mysqli_fetch_array($result);
							if ($ord_data['count'] == 0) { echo "Нет заявок"; } else {
								$query = "SELECT id, /*owner, performer,*/ description, serv, ordate, timeint, state, date_create,
											(SELECT CONCAT(name,\" \", surname) FROM users WHERE id = owner) as author,
											(SELECT name FROM service WHERE id = serv) as category,
											(SELECT CONCAT(city,\" \", street,\" \", house,\", комната \", room)
												FROM address, users
												WHERE users.id = owner AND home = address.id) as address,
											(SELECT CONCAT(name,\" \", surname)
												FROM staff, users
												WHERE orders.performer = staff.id and staff.uid = users.id) as performer
											FROM orders
											WHERE owner = " .$user_data['id'].
											" ORDER BY date_create DESC" 
											or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
							}
						}
						if ($ord_data['count'] != 0) {
							$result = $link->query($query);
							$ord_data = mysqli_fetch_array($result);			
							echo ('<div id="content">');
							$timeint = "";
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
								echo ('<div class="form-group">

											<p><strong>Категория: </strong>'.$ord_data['category']."</p>\n"
											."<p><strong>Описание: </strong>".$ord_data['description']."</p>\n"
											."<p><strong>Дата и время обслуживания:</strong> ".$ord_data['ordate']." ".$timeint."</p>\n"
											."<p><strong>Адрес:</strong> ".$ord_data['address']."</p>\n"
											."<p><strong>Автор заявки:</strong> ".$ord_data['author']."</p>\n"
											."<p><strong>Дата и время добавления заявки:</strong> ".$ord_data['date_create']."</p>\n"
											."<p><strong>Состояние заказа:</strong> ".$ord_data['state']."</p>\n"
											."<p><strong>Исполнитель заказа:</strong> ".$ord_data['performer']."</p>\n"
											
										);
									//echo ('<a href="services.php?inv='.$ord_data['id'].'" class="button danger" style="text-align:center;">Удалить</a><br><br>');

								echo ('</div>');
							} while ($ord_data=mysqli_fetch_array($result));
							echo ('</div>');
						}
							echo '</div>';
					}?>
					<div role="tabpanel" class="tab-pane" id="favourites">Здесь будут закладки</div>
					<div role="tabpanel" class="tab-pane" id="myAds">
					</div>
					<?php if ($user_data['role'] == 'admin' || $user_data['role'] == 'moder') {
						echo '<div role="tabpanel" class="tab-pane" id="tools">';
						// include "registration_role.php";
						echo <<<END
							<div Class="panel-heading"><h4 Class="modal-title">Добавление нового пользователя</h4></div>
								<div class="container">
									<input type="submit" Class="btn Btn-primary" value="Зарегистрировать нового пользователя" onclick=" location.href='registration.php'  ">
								</div>
							</div>
END;
					}?>
					
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	<script src="js/bootstrap-tab.js"></script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/moment-with-locales.min.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>

<script Src="js/jquery.js"></script>
<script Src="js/jquery2.4.1.js"></script>
<script Src="js/jquery.validate.js"></script>
<script Src="js/registration.js"></script>
<script Src="js/bootstrap.min.js"></script> 
<script Src="js/jquery.pstrength-min.1.2.js"></script>

<script type="text/javascript">
	$(function () {
		$('#datetimepicker1').datetimepicker({pickTime: false, language: 'ru',defaultDate:"09.01.2015",});
	});
</script>
</body></html>