<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>.: ПОРТАЛ ОБЩЕЖИТИЯ НИЯУ МИФИ :. </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Le styles -->
<link rel="stylesheet" type="text/css" href="CSS/dropdown.css" />	
<link rel="stylesheet" href="CSS/bootstrap-datetimepicker.min.css" />
<link rel="stylesheet" type="text/css" href="CSS/dropdown.css" />	
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
				<a style="color: whitesmoke;" class="navbar-brand" href="index.php">Портал общежития НИЯУ МИФИ</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
					<li><a style="color: whitesmoke" href="index.php">ГЛАВНАЯ</a></li>
					<li class="active"><a style="color: whitesmoke" href="dashboard.php">ДОСКА ОБЪЯВЛЕНИЙ</a></li>
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
	    		$check_query = "SELECT count(staff.id) as count FROM users, staff WHERE users.id = staff.uid" 
	                                            or die("Ошибка при выполнении запроса.." . mysqli_error($link));
	            $query = "SELECT CONCAT(name,\" \", surname) as staff_name, rating FROM users, staff WHERE users.id = staff.uid" 
	                                            or die("Ошибка при выполнении запроса.." . mysqli_error($link));
	            $result = $link->query($check_query);
	            $data = mysqli_fetch_array($result); 
	            if ($data['count'] != 0) {
	                $result = $link->query($query);
	                $data = mysqli_fetch_array($result);         
	                echo('<table id="grid-basic" class="table table-hover table-responsive table-bordered" width="2000%">');
	                echo('
	        			<thead>
	        			<th colspan="1" rowspan="3" data-column-id="staff_name"><strong>Персонал</strong></th>
	        			<th colspan="1" rowspan="3" data-column-id="rating"><strong>Рейтинг</strong></th>
	        			</thead>');
	                    do {
	                    	echo ('<div class="container">
	            			<td><p>' .$data['staff_name']. '</p></td>
	            			<td><p>' .$data['rating']. '</p></td>
	        				</tr>'
	                        );
	                        echo ('</div>');
	                    } while ($data=mysqli_fetch_array($result));
	                    echo('</table>');  
	            } else {
	            	echo "Персонал отсутствует";
	            }
            } else {
            	echo "Вам не доступна данная страница";
            }      
			?>
				
		</div>
	</div>
</div>
	<script src="js/bootstrap-tab.js"></script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/moment-with-locales.min.js"></script>
	<script src="js/dropdown.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>
</body></html>