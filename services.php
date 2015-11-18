<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>.: ПОРТАЛ ОБЩЕЖИТИЯ НИЯУ МИФИ :. </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link rel="stylesheet" type="text/css" href="CSS/dropdown.css" />	
<link href="CSS/bootstrap.css" rel="stylesheet">
<link href="CSS/content.css" rel="stylesheet">
<link rel="stylesheet" href="CSS/bootstrap-datetimepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

<!-- ... -->

<script>
function showButtons(serv, date) {
    if (serv == "") {
        document.getElementById("time").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("time").innerHTML = "<label for='time'>Выберите удобный промежуток времени</label><br/>"+xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","serv_buttons.php?serv="+serv+"&date="+date.substr(6, 4)+"-"+date.substr(3, 2)+"-"+date.substr(0, 2),true); 
		//alert("serv_buttons.php?serv="+serv+"&date="+date.substr(6, 4)+"-"+date.substr(3, 2)+"-"+date.substr(0, 2));
        xmlhttp.send();
    }
}
</script>
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
				<a style="color: whitesmoke;" class="navbar-brand" href="index.php">Портал общежития НИЯУ МИФИ</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
					<li><a style="color: whitesmoke" href="index.php">ГЛАВНАЯ</a></li>
					<li><a style="color: whitesmoke" href="dashboard.php">ДОСКА ОБЪЯВЛЕНИЙ</a></li>
					<li class="active"><a style="color: whitesmoke" href="services.php">УСЛУГИ</a></li>
				</ul>
				<?php
                    include("/lib/log.php");
                ?>
                <?php
                    include("/lib/check_serv.php");
                ?>
			</div>
		</div>
	</nav>

	<div class="container">
		<form method = "post" action = "./lib/serv.php">
			<div class="span3">
				<div class="control-group">
					<label for="service">Выберите тип оказываемой услуги</label>
					<div class="controls">
						<select name="service" id="service" class="form-control" onchange="showButtons(document.getElementById('service').value, $('#datetimepicker1').data('date'))">
							<option value="" selected="selected">Выберите услугу</option>
							<option value="1">Сантехник</option>
							<option value="2">Электрик</option>
							<option value="3">Плотник</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<br/><label for="comment">Комментарий к заявке</label>
					<textarea class="form-control" rows="4" name="comment" id="comment" placeholder="Комментарий к заявке"></textarea>
				</div>
				<div class="control-group form-group">
					<label for="date">Выберите дату оказания услуги</label>
					<div class="form-group">
						<div class="input-group date" id="datetimepicker1">
							<input type="text" Name="ordate" Id="ordate" class="form-control" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
				</div>

				<input type="number" name="timeint" id="timeint" value="1" style="display:none"/> 
				<div id="time" selectedValue="1" class=" btn-group; data-toggle = "buttons";" data-toggle="buttons" >				

				</div>
				<br/>
				<input Type="submit"  Class="btn btn-default" Value="Отправить" Name="add_order"/>
			</div>
		</form>
	</div>
</div>
<script src="js/bootstrap-tab.js"></script>
	<script>
		$(function () {
			$('#datetimepicker1').datetimepicker({
				pickTime: false,
				language: 'ru',
				defaultDate: moment().add('d', 1).toDate(),
				daysOfWeekDisabled: [0, 6],
				minDate: moment().add('d', 1).toDate(),
				maxDate: moment().add('d', 30).toDate()
			});
		});
	</script>
	<script src="js/bootstrap-tab.js"></script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/moment-with-locales.min.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>
</body></html>