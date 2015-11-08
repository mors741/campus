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

	<div class="row" style="width: 150%">
		<div class="col-md-6">
			<div class="card">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Личная информация</a></li>
					<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Редактировать</a></li>
					<li role="presentation"><a href="#privacySettings" aria-controls="privacySettings" role="tab" data-toggle="tab">Настройки приватности</a></li>
					<li role="presentation"><a href="#favourites" aria-controls="favourites" role="tab" data-toggle="tab">Закладки</a></li>
					<li role="presentation"><a href="#myAds" aria-controls="myAds" role="tab" data-toggle="tab">Мои объявления</a></li>
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
											<br/><label for="name">Имя :</label> <?php echo $user_data['name'] ?>
											<br/><label for="surname">Фамилия: </label> <?php echo $user_data['surname'] ?>
											<br/> <label for="address">Корпус: </label> <?php echo $user_data['home'] ?>
											<br/> <label for="room">Номер комнаты: </label> <?php echo $user_data['room'] ?>
											<!--<br/> <label for="birthday">Дата рождения: </label> <?php echo $user_data['bdate'] ?>
											<br/> <label for="conact">Контакты: </label> <?php echo $user_data['contacts'] ?> -->
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
										<label for="surname">Фамилия</label>
										<div class="form-group">
											<input id="surname" class="form-control" placeholder="Фамилия"/>
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
									<div class="control-group form-group">
										<label for="contact">Контакты</label>
										<div class="form-group">
											<input type="tel" id="contact" class="form-control" placeholder="Контакты"/>
										</div>
									</div>
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
					<div role="tabpanel" class="tab-pane" id="favourites">Здесь будут закладки</div>
					<div role="tabpanel" class="tab-pane" id="myAds">Здесь будут объявления</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script src="js/bootstrap-tab.js"></script>

<script type="text/javascript">
	$(function () {
		$('#datetimepicker1').datetimepicker({pickTime: false, language: 'ru',defaultDate:"09.01.2015",});
	});
</script>
</body></html>