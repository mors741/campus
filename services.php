<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
	<link rel="stylesheet" href="CSS/button.css" />
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
				<li class="active"><a style="color: whitesmoke" href="services.php">УСЛУГИ</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<div class="span3">
			<div class="control-group">
				<label for="address">Выберите тип оказываемой услуги</label>
				<div class="controls">
					<select id="address" class="form-control">
						<option value="" selected="selected">Выберите услугу</option>
						<option value="1">Сантехника</option>
						<option value="2">Электрика</option>
						<option value="3">Плотник</option>
					</select>
				</div>
			</div>
		<div class="form-group">
			<br/><label for="comment">Комментарий к заявке</label>
			<textarea class="form-control" rows="5" id="comment" placeholder="Комментарий к заявке"></textarea>
		</div>
		<div class="control-group form-group">
			<label for="date">Выберите дату оказания услуги</label>
			<div class="form-group">
				<div class="input-group date" id="datetimepicker1">
					<input type="text" class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
				</div>
			</div>
		</div>

		<div class=" btn-group; data-toggle = "buttons";" data-toggle="buttons" >
		<label for="time">Выберите удобный промежуток времени</label><br/>
			<label class="btn btn-custom gradient active" style="width: 120px" >
				<input type="radio" name="options" id="1" autocomplete="off" checked>9:00 - 9:45
			</label>
			<label class="btn btn-custom gradient disabled" style="width: 120px" >
				<input type="radio" name="options" id="2" autocomplete="off" > 10:00 - 10:45
			</label>
			<label class="btn btn-custom gradient" style="width: 120px ; background-s" >
				<input type="radio" name="options" id="3" autocomplete="off" > 11:00 - 11:45
			</label>
			<label class="btn btn-custom gradient" style="width: 120px" >
			<input type="radio" name="options" id="4" autocomplete="off"> 12:00 - 10:45
			</label>
			<label class="btn btn-custom gradient" style="width: 120px" >
			<input type="radio" name="options" id="5" autocomplete="off"> 14:00 - 14:45
			</label>
			<label class="btn btn-custom gradient" style="width: 120px" >
			<input type="radio" name="options" id="6" autocomplete="off"> 15:00 - 15:45
			</label>
			<label class="btn btn-custom gradient" style="width: 120px" >
			<input type="radio" name="options" id="7" autocomplete="off"> 16:00 - 16:45
			</label>
			<label class="btn btn-custom gradient" style="width: 120px" >
			<input type="radio" name="options" id="8" autocomplete="off"> 17:00 - 17:45
			</label>
		</div>
		<br/><button type="submit" class="btn btn-default">Отправить</button>
</div>



	</div>
</div>
<script src="js/bootstrap-tab.js"></script>

<script type="text/javascript">
	$(function () {
		$('#datetimepicker1').datetimepicker({pickTime: false, language: 'ru',defaultDate:"09.01.2015", daysOfWeekDisabled: [0, 6]});
	});
</script>
</body></html>