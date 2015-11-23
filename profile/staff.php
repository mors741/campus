<!DOCTYPE html>
<!-- saved from url=(0041)http://mybootstrap.ru/examples/hero.html# -->
<html lang="ru">
    <head>
        <title>.: ПОРТАЛ ОБЩЕЖИТИЯ НИЯУ МИФИ :. </title>
        <!--Мета-данные-->
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Портал общежития НИЯУ МИФИ">
        <meta name="author" content="campus">
        <!--Конец-->

        <!-- Стили-->
        <link rel="stylesheet" type="text/css" href="CSS/dropdown.css" />	
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="CSS/content.css" >
        <link rel="stylesheet" type="text/css" href="CSS/datepicker3.min.css" />
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" type="text/css" href="CSS/button.css" />
        <link rel="stylesheet" type="text/css" href="CSS/jquery.bootgrid.css" />
        <!--Конец-->

    </head>

    <body>
        <!--Меню-->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!--Для мобильных устройств-->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--Для мобильных устройств END-->
                    <a class="navbar-brand" href="index.php">Портал общежития НИЯУ МИФИ</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="index.php">ГЛАВНАЯ</a>
                        </li>
                        <li>
                            <a href="dashboard.php">ДОСКА ОБЪЯВЛЕНИЙ</a>
                        </li>
                        <li>
                            <a href="services.php">УСЛУГИ</a>
                        </li>
                    </ul>
                    <?php
                    include("lib/log.php"); //Включение кнопок авторизации и регистрации
                    ?>	
                </div>
            </div>
        </nav>
        <!--Меню END-->
        <!-- Контейнер. Центральная часть-->
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
                            echo ('<div class="content">
	            			<td><p>' . $data['staff_name'] . '</p></td>
	            			<td><p>' . $data['rating'] . '</p></td>
	        				</tr>'
                            );
                            echo ('</div>');
                        } while ($data = mysqli_fetch_array($result));
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
        <!-- Контейнер. Центральная часть END-->
        <!-- Пол-->
        <footer>
            <p style="color:white">© Портал общежития НИЯУ МИФИ, 2015</p>
            <font style="color:white">© 2015 Портал общежития НИЯУ МИФИ
            <br>
            г. Москва, ул. Москворечье, д. 2. корп. 1 и 2
            <br>
            г. Москва, ул. Москворечье, д. 19, корп. 3 и 4
            <br>
            г. Москва, ул. Кошкина, д. 11, корп. 1.
            <br>
            Заведующая общежитием - Мозгунова Валентина Ивановна, тел. (499) 725-24-47, ул. Москворечье, д. 2, кор. 1, ком. 142
            <br>
            Заместитель директора - Тараканов Юрий Михайлович, тел. (499) 725-24-85, ул. Москворечье, д. 2 кор. 2, ком. 8
            <br>
            Начальник управления студенческими общежитиями — Краскович Сергей Леонидович, тел. (499) 725-24-85
            <br>
            </font>
        </footer>
        <!-- Пол END-->
        <!-- JavaScript. Для быстрой загрзуки помещайте в конце страницы, указав в начале скрипт jQuery-->
        <script src="js/jquery2.4.1.js"></script>
        <script src="js/moment-with-locales.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <script src="js/bootstrap-tab.js"></script>	
        <script src="js/dropdown.js"></script>
    </body>
</html>