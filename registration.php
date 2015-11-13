<!DOCTYPE html>
<!-- saved from url=(0041)http://mybootstrap.ru/examples/hero.html# -->
<html lang="ru"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>.: ПОРТАЛ ОБЩЕЖИТИЯ НИЯУ МИФИ - Регистрация :. </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<!-- <link href="CSS/bootstrap.css" rel="stylesheet">
	<link href="CSS/content.css" rel="stylesheet"> -->
	<!-- Le styles -->
	<link rel="stylesheet" type="text/css" href="CSS/dropdown.css" />	
	<link rel="stylesheet" type="text/css" href="CSS/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="CSS/content.css" >
	<link rel="stylesheet" type="text/css" href="CSS/button.css" />
	<link rel="stylesheet" type="text/css" href="CSS/message.css"/>
	<!-- ... -->

	<script src="js/jquery.js"></script>
	<script src="js/jquery2.4.1.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script src="js/registration.js"></script>
	<script src="js/bootstrap.min.js"></script> 
	<script src="js/jquery.pstrength-min.1.2.js"></script>
	<script src="js/dropdown.js"></script>

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"></button>
				<a class="navbar-brand" href="index.php">Портал общежития НИЯУ МИФИ</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
					<li class="active"><a href="index.php">ГЛАВНАЯ</a></li>
					<li><a href="dashboard.php">ДОСКА ОБЪЯВЛЕНИЙ</a></li>
					<li><a href="services.php">УСЛУГИ</a></li>
				</ul>
				<?php
				include("/lib/log.php");
				?>	
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">АВТОРИЗАЦИЯ</h4>
				</div>
				<div class="modal-body">
					<div style="padding-top:30px" class="panel-body" >
						<form role="form" method="post" action="index.php" class="form-horizontal">
							<div style="margin-bottom: 25px" class="input-group">

								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="email" class="form-control" id="login" name="login" placeholder="Введите email">
							</div>
							<div style="margin-bottom: 25px" class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox"> Запомнить
								</label>
							</div>
							<br>
							<button type="submit" name="enter"  class="btn btn-primary">Отправить</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
						</form>
					</div>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>

	<div class="container">

		<!-- Main hero unit for a primary marketing message or call to action -->

		<div class="span3">
			<div class="panel-heading"><h4 class="modal-title">РЕГИСТРАЦИЯ</h4></div>

			<form action="" method="post" id="register-form">
				<div class="span-reg">
					<div class="control-group form-group">
						<label for="login">Логин (email НИЯУ МИФИ)</label>
						<div class="form-group">
							<input type="text" name="login" id="login" class="form-control" placeholder="email"/>

						</div>
					</div>

					<div class="control-group form-group">
						<label for="password">Пароль</label>
						<div class="form-group">
							<input type="password" name="pass" id="pass" class="form-control"  placeholder="Пароль" rel='tooltip'/>

						</div>
					</div>

					<div class="control-group form-group">
						<label for="password">Подтвердите пароль</label>
						<div class="form-group">
							<input type="password" name="rpass" id="rpass" class="form-control"  placeholder="Пароль"/>
						</div>
					</div>


					<div class="control-group form-group">
						<label for="surname">Фамилия</label>
						<div class="form-group">
							<input type="text" name="surname" id="surname" class="form-control" placeholder="Фамилия"/>
						</div>
					</div>

					<div class="control-group form-group">
						<label for="name">Имя</label>
						<div class="form-group">
							<input type="text" name="name" id="name" class="form-control" placeholder="Имя"/>
						</div>
					</div>
				</div>
				<div class="span-reg">
					<div class="control-group form-group" >
						<label for="yes">Проживаете в общежитии?</label>
						<div class="form-group">
							<label><input type="radio" name="yes" id="yes" value="user"  title="Да"/>Да</label>
							<label><input type="radio" name="yes" id="no" value="nouser"  title="Нет"/>Нет</label>
							<br>
							<label for="yes" class="error" generated="true" style="display:none"></label>
						</div>
					</div>
					<div id="user" style="display:none; width:100%">
						<div class="control-group form-group">
							<label for="home">Адрес</label>
							<div class="form group">
								<select name="home" id="home" class="form-control">
									<option value="0" selected="selected">(Выберите корпус общежития)</option>
									<option value="1">ул. Москворечье д.2 корп 1</option>
									<option value="2">ул. Москворечье д.2 корп 2</option>
									<option value="3">ул. Москворечье, д.19 корп 3</option>
									<option value="4">ул. Москворечье, д.19 корп 4</option>
									<option value="5">ул. Кошкина д.11 корп. 1</option>
									<option value="6">ул. Шкулева д.27 ст 2</option>
									<option value="7">ул. Пролетарский проспект д. 8 корп. 2</option>
								</select>
							</div>
						</div>
						<div class="control-group form-group" >
							<label for="room">Квартира</label>
							<div class="form-group">
								<input type="text"  value="" name="room" id="room" class="form-control"/>
							</div>
						</div>
					</div>
					<?php
					if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
						echo '
						<hr>
						<div class="control-group form-group">
						<label For="role">Роль</label>
						<select Class="form-control" Id="select_role" Name ="select_role">
						<option Value="admin">Администратор сайта</option>
						<option Value="moder">Модератор сайта</option>
						<option Value="manage">Администрация общежития</option>
						<option Value="staff">Персонал общежития</option>
						</select>
						</div>
						';
					}
					?>
				</div>
				<br>
				<div style="margin-top: 480px; ">
					<hr>
					<?php
					if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
						echo '
						<div class="control-group form-group" >
						<label><input type="checkbox"  value="agree" name="agree" />  Я прочитал и согласен с правилами пользовательского соглашения</label>
						<label for="agree" class="error" generated="true" style="display:none"></label>
						</div>
						';
					}
					?>
					<div class="control-group form-group">
						<input type="submit"  class="btn btn-primary" value="Зарегистрироваться" name="register"/>
					</div>
				</div>
			</form>


		</div>
	</div>
	<footer>
		<p style="color:white">© Портал общежития НИЯУ МИФИ, 2015</p>
		<font style="color:white">© 2015 Портал общежития НИЯУ МИФИ <br>
			г. Москва, ул. Москворечье, д. 2. корп. 1 и 2<br>
			г. Москва, ул. Москворечье, д. 19, корп. 3 и 4<br>
			г. Москва, ул. Кошкина, д. 11, корп. 1.<br>
			Заведующая общежитием - Мозгунова Валентина Ивановна, тел. (499) 725-24-47, ул. Москворечье, д. 2, кор. 1, ком. 142<br>
			Заместитель директора - Тараканов Юрий Михайлович, тел. (499) 725-24-85, ул. Москворечье, д. 2 кор. 2, ком. 8<br>
			Начальник управления студенческими общежитиями — Краскович Сергей Леонидович, тел. (499) 725-24-85<br>
		</font>
	</footer>
	<!-- /container -->

	<?php
	include('/lib/reg.php');
	?>
</body>
</html>