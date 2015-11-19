
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
		<link rel="stylesheet" href="CSS/button.css" />
    <link rel="stylesheet" href="CSS/jquery.bootgrid.css" />


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
                    include("lib/log.php");
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
					<!--<li role="presentation"><a href="#privacySettings" aria-controls="privacySettings" role="tab" data-toggle="tab">Настройки приватности</a></li>!-->
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
                    }
                    if ($user_data['role'] == 'admin' || $user_data['role'] == 'moder' || $user_data['role'] == 'manage' || $user_data['role'] == 'staff') {
                        echo '<li role="presentation"><a href="#staff" aria-controls="staff" role="tab" data-toggle="tab">Персонал</a></li>';
					}?>
				</ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2 col-md-2">
                                                <br/><img src="<?php echo $user_data['picture'] ?>"
                                                          alt="" class="img-rounded img-responsive" />
                                            </div>
                                            <div class="col-sm-4 col-md-4">
                                                <p> <br/><label for="login">E-Mail: </label> <?php echo $user_data['login'] ?>
                                                    <br/><label for="name">Имя:</label> <?php echo $user_data['name'] ?>
                                                    <?php
                                                    if ($user_data['patronymic'] != '') {
                                                        echo '<br/><label for="patronymic">Отчество: </label> ';
                                                        echo $user_data['patronymic'];
                                                    }
                                                    ?>
                                                    <br/><label for="surname">Фамилия: </label> <?php echo $user_data['surname'] ?>
                                                    <?php
                                                    if ($user_data['role'] == 'staff') {
                                                        echo '<br/><label for="post">Должность: </label> ';
                                                        echo $user_data['post'];
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($user_data['gender'] != '') {
                                                        echo '<br/><label for="gender">Пол: </label> ';
                                                        echo " ";
                                                        echo $user_data['gender'];
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($user_data['bdate'] != '') {
                                                        echo '<br/><label for="bdate">Дата рождения: </label> ';
                                                        echo $user_data['bdate'];
                                                    }
                                                    ?>
                                                    <?php
                                                    if ($user_data['contacts'] != '') {
                                                        echo '<br/><label for="contacts">Контакты: </label> ';
                                                        echo $user_data['contacts'];
                                                    }
                                                    ?>
<?php
if ($user_data['home'] != 0) {
    echo '<br/><label for="address">Корпус: </label> ';
    echo $user_data['home'];
}
?>
<?php
if ($user_data['room'] != 0) {
    echo '<br/><label for="room">Комната: </label> ';
    echo $user_data['room'];
}
?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="settings">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2 col-md-2">

                                                <form action="" method="post" enctype="form-data" id="js-upload-form" >
                                                    <div id="upload" style="background-image: url('<?php echo $user_data['picture'] ?>'); background-size: cover; width:100px; height:100px;"  class="img-rounded" ></div>	
                                                    <div class="control-group form-group" style="margin-left: 40px">

                                                        <span class="btn btn-default btn-file">               
                                                            Выбрать<input type="file"  id="js-upload-files"  name="datafile" onchange="fileUpload(this.form, 'upload_file.php', 'upload')">
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-sm-8 col-md-6">
                                                <fieldset>
                                                    <legend>Смена Пароля</legend>
                                                    <div class="control-group form-group">

                                                        <label  id="password-error" class="error valid" generated="true" style="display:none"></label>
                                                        <br/><label for="password">Старый пароль</label>
                                                        <div class="form-group">
                                                            <input type="password" id="password" class="form-control"  placeholder="Старый пароль"/>
                                                        </div>
                                                    </div>
                                                    <form id="check_passwd" action="lib/update_pass.php" method="POST">
                                                        <div class="control-group form-group">
                                                            <label for="passwd">Новый пароль</label>
                                                            <div class="form-group">
                                                                <input type="password" disabled="true" id="passwd" name="passwd" class="form-control"  placeholder="Новый пароль"/>
                                                                <input type="hidden" id="submit_pass" value="Сохранить">
                                                                <div id="passwd_new"></div>  
                                                            </div>
                                                        </div>
                                                    </form>
                                                </fieldset>
                                                <br>
                                                <fieldset>
                                                    <legend> Ф.И.О.</legend>
                                                    <div class="control-group form-group">
                                                        <label  id="name-error" class="error" generated="true" style="display:none"></label>
                                                        <br>
                                                        <label for="name">Имя</label>
                                                        <div class="form-group">
                                                            <div id="name" class="editable"><?php echo $user_data['name'] ?> </div></div>
                                                    </div>

                                                    <div class="control-group form-group">
                                                        <label for="patronymic">Отчество</label>
                                                        <div class="form-group">
                                                            <div id="patronymic" class="editable"><?php echo $user_data['patronymic'] ?> </div></div>
                                                    </div>

                                                    <div class="control-group form-group">
                                                        <label for="surname">Фамилия</label>
                                                        <div class="form-group">
                                                            <div id="surname" class="editable"><?php echo $user_data['surname'] ?></div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <br>
                                             

                                                <?php
                                                if ($user_data['role'] == 'local' || $user_data['role'] == 'campus') {
                                                    $gender = $user_data['gender'];
                                                    $bdate=$user_data['bdate'];
                                                    echo <<< EOT
									<fieldset>
                                                    <legend>Дополнительная информация</legend>				
									<div class="control-group form-group">
										<label for="patronymic">Пол</label>
										<div class="form-group">
											<div id="gender" class="editable_select">$gender</div>
                                                                                <br>
                                                                                
												
										</div>
									</div>
									<div class="control-group form-group">
										<label for="birthday">Дата рождения</label>
										<div class="form-group">
											<div class="input-group date" id="datetimepicker2">
												<input type="text" class="form-control" name="bdate" id="bdate" value="$bdate" />
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
                                                                             
                                                                                
											</div>
                                                                                <div id="bdate_save"></div>
                                                                                <br>
										</div>
									</div>
                                                            </fieldset>
EOT;
                                                }
                                                ?>
                                        
                                                <br>
                                                 <fieldset>
                                                    <legend>Связь с Вами</legend>
                                                <div class="control-group form-group">
                                                    <label for="contact">Контакты</label>
                                                    <div class="form-group">
                                                        <div class="editable_contact" id="contacts"><?php echo $user_data['contacts']?></div>

                                                        <div id="contact_save"></div>
                                                        <br>
                                                    </div>
                                                </div>
                                                    
                    <?php
                        if ($user_data['home'] != '0' && $user_data['role'] != 'staff') {
                                         $room = $user_data['room'];
                                         $home = $user_data['home'];
                                                        echo <<< EOT
								    <div class="control-group">
										<label for="address">Адрес (корпус):</label>
										<div class="form-group">
											<div id="home" name="home" class="editable_address" >$home</div>
											<br>	
										</div>
									</div>
                                                                
									<div class="control-group form-group">
                                                                        
										<label for="room">Номер комнаты (квартиры)</label>
										<div class="form-group">
											<div id="room" class="editable_room">$room</div>
										</div>
                                                                <br>
                                                                <label  id="room-error" class="error valid" generated="true" style="display:none"></label>
									</div>
EOT;
}
?>
                                                 </fieldset>
                                                <br/><button type="" onclick="document.location.reload()" class="btn btn-default">Обновить информацию</button>
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
                                        if ($ord_data['count'] == 0) {
                                            echo "Нет заявок";
                                        } else {
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
										WHERE  orders.performer = staff.id and staff.uid = users.id and users.id = " . $user_data['id'] . "
										ORDER BY date_create DESC"
                                                or die("Ошибка при выполнении запроса.." . mysqli_error($link));
                                        $result = $link->query($check_query);
                                        $ord_data = mysqli_fetch_array($result);
                                        if ($ord_data['count'] == 0) {
                                            echo "Нет заявок";
                                        } else {
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
							echo "<h3><strong>Мои заявки на услуги</strong></h3>";
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
										WHERE owner = " . $user_data['id'] .
                                                " ORDER BY date_create DESC"
                                                or die("Ошибка при выполнении запроса.." . mysqli_error($link));
                                        $result = $link->query($check_query);
                                        $ord_data = mysqli_fetch_array($result);
                                        if ($ord_data['count'] == 0) {
                                            echo "Нет заявок";
                                        } else {
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
							echo('<table id="grid-basic" class="table table-hover table-responsive table-bordered" width="2000%">');
                            echo('
        <thead>
        <th colspan="4" rowspan="3" data-column-id="category"><strong>Категория</strong></th>
        <th  colspan="4" rowspan="3" data-column-id="description"><strong>Описание</strong></th>
        <th colspan="4" rowspan="3" data-column-id="ordate"><strong>Дата и время обслуживания</strong></th>
        <th colspan="4" rowspan="3" data-column-id="address"><strong>Адрес</strong></th>
        <th colspan="4" rowspan="3" data-column-id="author"><strong>Автор заявки</strong></th>
        <th colspan="4" rowspan="3" data-column-id="date_create"><strong>Дата и время добавления заявки</strong></th>
        <th colspan="4" rowspan="3" data-column-id="state"><strong>Состояние заказа</strong> </th>
        <th colspan="4" rowspan="3" data-column-id="performer"><strong>Исполнитель заказа</strong></th>

        </thead>');
							do {
								echo ('<div class="container">

        <tr >
            <td><p>' .$ord_data['category']. "</p></td>
            <td >"
													. "<p>" .$ord_data['description']. "</p></td>
            <td>"
													. "<p>" .$ord_data['ordate']. " " .$timeint. "</p></td>
            <td>"
													. "<p>" .$ord_data['address']. "</p></td>
            <td>"
													. "<p>" .$ord_data['author']. "</p></td>
            <td>"
													. "<p>" .$ord_data['date_create']. "</p></td>
            <td>"
													. "<p>" .$ord_data['state']. "</p></td>
            <td>"
													. "<p>" .$ord_data['performer']. "</p></td>
        </tr>"


										);
									//echo ('<a href="services.php?inv='.$ord_data['id'].'" class="button danger" style="text-align:center;">Удалить</a><br><br>');
								echo ('</div>');
							} while ($ord_data=mysqli_fetch_array($result));

                            echo('</table>');
                            echo ('</div>');
						}
							echo '</div>';
					}?>
					<div  role="tabpanel" class="tab-pane" id="favourites">Здесь будут закладки</div>
					<div role="tabpanel" class="tab-pane" id="myAds">
					</div>
					<?php if ($user_data['role'] == 'admin' || $user_data['role'] == 'moder') {
						echo '<div role="tabpanel" class="tab-pane" id="tools">';
						// include "registration_role.php";
						echo <<<END
							<div Class="panel-heading"><h4 Class="modal-title">Добавление нового пользователя</h4></div>
								<div class="container">
									<input type="submit" Class="btn btn-default" value="Зарегистрировать нового пользователя" onclick=" location.href='registration.php'  ">
								</div>
							</div>
END;
}
                    if ($user_data['role'] == 'admin' || $user_data['role'] == 'moder' || $user_data['role'] == 'manage' || $user_data['role'] == 'staff') {
                        echo '<div role="tabpanel" class="tab-pane" id="staff">';
                        echo ('<div id="content">');
                        echo '</div>';
                        echo '</div>';
					}?>
					
				</div>
			</div>
		</div>
	</div>
</div>
</div>
        <!--Обязательно указывайте исходные библиотеки jQuery над всеми остальными скриптами-->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <script src="js/jquery2.4.1.js"></script>
        <script src="js/jquery.validate.js"></script>
        <script src="js/jquery.pstrength-min.1.2.js"></script>
        <script src="js/jquery.jeditable.js"></script>
        <script src="js/jquery.maskedinput.min.js"></script>
        <script src="js/jquery.jeditable.masked.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/moment-with-locales.min.js"></script>
        <script src="js/bootstrap-tab.js"></script>
        <script src="js/dropdown.js"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <script src="js/passvalid.js"></script>
        <script src="js/common-edit.js"></script>
        <script src="js/upload_avatar.js"></script>
        <script src="JS/jquery.bootgrid.fa.js"></script>
        <script src="JS/jquery.bootgrid.js"></script>

	<script>
		$(".spoiler-trigger").click(function() {
			$(this).parent().next().collapse('toggle');
		});
	</script>
  <script>
      $("#grid-basic").bootgrid();
  </script>


    </body></html>
