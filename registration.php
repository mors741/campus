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
  

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/wp-content/themes/clear-theme/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
  
    </head>

  <body>
          


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

		
			<form action="" method="post" id="register-form" novalidate="novalidate">
				<div class="control-group form-group">
					<label for="login">Логин</label>
					<div class="form-group">
						<input type="text" name="login" id="login" class="form-control"  placeholder="Введите email"/>
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
						<input type="password" name="password" id="confirmpassword" class="form-control"  placeholder="Пароль"/>
					</div>
				</div>

				<div class="control-group form-group">
					<label for="login">Фамилия</label>
					<div class="controls">
						<input type="text" name="surname" id="surname" class="medium inputs"/>
					</div>
				</div>

				<div class="control-group form-group">
					<label for="login">Имя</label>
					<div class="controls">
						<input type="text" name="name" id="name" class="medium inputs"/>
					</div>
				</div>

				<div class="control-group form-group" >
					<label for="login">Проживаете в общежитии?</label>
					<div class="controls">
						<input type="checkbox" name="obshaga" id="obshaga" class="medium inputs"/>
					</div>
				</div>

				<div class="control-group form-group" >
					<input type="submit" class="button subit" value="Зарегистрироваться" name="register" style="margin-right: 100;"/>
				</div>
			</form>
                
	</div>
      </div>
  
     

	</body>
</html>