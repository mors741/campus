<!DOCTYPE html>
<!-- saved from url=(0041)http://mybootstrap.ru/examples/hero.html# -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Bootstrap, from Twitter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="CSS/bootstrap.css" rel="stylesheet">
    <link href="CSS/content.css" rel="stylesheet">
  

	  <script src="js/jquery-2.1.4.js"></script>
	  <script src="js/jquery.validate.min.js"></script>
	  <script src="js/registration.js"></script>

    </head>

  <body>
<?php

$link = mysqli_connect('localhost','root','','campus') or die("Ошибка при соединении с базой данных.." . mysqli_error($link));

if(isset($_POST['register'])){
	$login=$_POST['login'];
	$password=md5($_POST['password']);
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$yes=$_POST['yes'];
	if ($yes=="no") {
		$home = 0;
		$room = 0;
	}
	else
	{
		$home=$_POST['home'];
		$room=$_POST['room'];
	}
	$query = "SELECT id FROM users WHERE login='$login'" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
	$result = $link->query($query);
	$myrow = mysqli_fetch_array($result);
	if (!empty($myrow['id'])) {
		echo ('<div class="m_auth m_error">Извините, введённый вами логин<br> уже зарегистрирован.<br>Введите другой логин</div>');
	}
	else {

		$query = "SELECT id FROM users WHERE home='$home'" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
		$result1 = $link->query($query);
		if ($result1 == "false"){
			echo <<<_END
                     <script>
alert("Ваш аккаунт успешно создан!")
</script>
<script>
document.location.replace("http://localhost/");
</script>
_END;
			die();
		}
		else {
			echo '<div class="m_auth m_error">Ошибка при регистрации<br>нового пользователя</div>';
		}
	}
}

?>


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					
				</button>
				<a class="navbar-brand" href="index.html">Портал общежития НИЯУ МИФИ</a>
                                
            
                                
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left">
              <li class="active"><a href="index.php">ГЛАВНАЯ</a></li>
              <li><a href="dashboard.php">ДОСКА ОБЪЯВЛЕНИЙ</a></li>
              <li><a href="services.php">УСЛУГИ</a></li>

            </ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a class="btn-group-au" href="registration.php">РЕГИСТРАЦИЯ</a>
					</li>
					<li>
						<button type="button" class="btn-group-au" data-toggle="modal" data-target="#myModal">АВТОРИЗАЦИЯ</button>
					</li>
				</ul>
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
       <form role="form">
  <div class="form-group">
    <label for="exampleInputEmail1">Логин (Email)</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Введите email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
  </div>
 
  <div class="checkbox">
    <label>
          <input type="checkbox"> Запомнить
        </label>
  </div>
  <button type="submit" class="btn btn-default">Отправить</button>
   <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
</form>

      </div>
      <div class="modal-footer">
       
      </div>
    </div>

  </div>
</div>
    <div class="container">
   
      <!-- Main hero unit for a primary marketing message or call to action -->
      
        <div class="span3">


			<form action="" method="post" id="register-form">
				<div class="control-group form-group">
					<label for="login">Логин</label>
					<div class="form-group">
						<input type="text" name="login" id="login" class="form-control"/>
						<p id="login_error"></p>
					</div>
</div>

				<div class="control-group form-group">
					<label for="password">Пароль</label>
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control"  placeholder="Пароль"/>
					</div>
				</div>

				<div class="control-group form-group">
					<label for="password">Подтвердите пароль</label>
					<div class="form-group">
						<input type="password" name="rpassword" id="rpassword" class="form-control"  placeholder="Пароль"/>
					</div>
				</div>

				<div class="control-group form-group">
					<label for="surname">Фамилия</label>
					<div class="form-group">
						<input type="text" name="surname" id="surname" class="form-control"/>
					</div>
				</div>

				<div class="control-group form-group">
					<label for="name">Имя</label>
					<div class="form-group">
						<input type="text" name="name" id="name" class="form-control"/>
					</div>
				</div>

				<div class="control-group form-group" >
					<label for="yes">Проживаете в общежитии?</label>
					<div class="form-group">
						<label for="yes"><input type="radio" name="yes" id="yes" value="user"  title="Да"/>Да</label>
						<label for="yes"><input type="radio" name="yes" id="no" value="nouser"  title="Нет"/>Нет</label>
					</div>
				</div>
<div id="user" style="display:none">
				<div class="control-group form-group" >
					<label for="home">Корпус</label>
					<div class="form-group">
						<input type="text"  value="" name="home" id="home" class="form-control"/>
					</div>
				</div>

				<div class="control-group form-group" >
					<label for="room">Квартира</label>
					<div class="form-group">
						<input type="text"  value="" name="room" id="room" class="form-control"/>
					</div>
				</div>
</div>
				<div class="control-group form-group" >
					<input type="submit" class="button submit" value="Зарегистрироваться" name="register" style="margin-right: 100;"/>
				</div>

			</form>

	</div>
      </div>
  
     

	</body>
</html>