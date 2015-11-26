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
    <link rel="stylesheet" type="text/css" href="../css/dropdown.css"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="../css/content.css">
    <link rel="stylesheet" type="text/css" href="../css/datepicker3.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/button.css"/>
    <link rel="stylesheet" type="text/css" href="../css/jquery.rating.css"/>
    <link rel="stylesheet" type="text/css" href="../css/jquery.bootgrid.css"/>
    <!--Конец-->

</head>
<body>
<!--Меню-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <!--Для мобильных устройств-->
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
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
            include("../lib/log.php"); //Включение кнопок авторизации и регистрации
            ?>
        </div>
    </div>
</nav>
<!--Меню END-->
<!-- Контейнер. Центральная часть-->
<div class="container">
    <div class="span3">
        <div class="row">
            <div class="card">
                <a class="btn btn-default" href="../profile/index.php">Личные данные</a>
                <a class="btn btn-default" href="../profile/userEdit.php">Редактирование данных</a>
                <a class="btn btn-default" href="../profile/favs.php">Закладки</a>
            </div>
            <div class="content">
                <div class="col-sm-2 col-md-2">
                    <br/>
                    <img src="../pictures/no_photo.jpg" alt="" class="img-rounded img-responsive"/>
                </div>
                <div class="col-sm-4 col-md-4">
                    <p>
                        <br/>
                        <label for="login">E-Mail: </label>
                        <br/>
                        <label for="surname">Фамилия: </label>
                        <br/>
                        <label for="name">Имя:</label>
                        <br/>
                        <label for="patronymic">Отчество: </label>
                        <br/>
                        <label for="post">Должность: </label>
                        <br/><label for="post">Рейтинг: </label>
                        <br/>
                        <label for="gender">Пол: </label
                        <br/>
                        <label for="bdate">Дата рождения: </label>
                        <br/>
                        <label for="contacts">Контакты: </label>
                        <br/><label for="address">Корпус: </label>
                    </p>
                </div>
            </div>
        </div>
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
        Заведующая общежитием - Мозгунова Валентина Ивановна, тел. (499) 725-24-47, ул. Москворечье, д. 2, кор. 1, ком.
        142
        <br>
        Заместитель директора - Тараканов Юрий Михайлович, тел. (499) 725-24-85, ул. Москворечье, д. 2 кор. 2, ком. 8
        <br>
        Начальник управления студенческими общежитиями — Краскович Сергей Леонидович, тел. (499) 725-24-85
        <br>
    </font>
</footer>
<script src="../js/jquery2.4.1.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/jquery.pstrength-min.1.2.js"></script>
<script src="../js/jquery.jeditable.js"></script>
<script src="../js/jquery.maskedinput.min.js"></script>
<script src="../js/jquery.jeditable.masked.js"></script>
<script src="../js/passvalid.js"></script>
<script src="../js/common-edit.js"></script>
<script src="../js/upload_avatar.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/moment-with-locales.min.js"></script>
<script src="../js/bootstrap-tab.js"></script>
<script src="../js/dropdown.js"></script>
<script src="../js/bootstrap-datetimepicker.min.js"></script>
<script src="../js/jquery.bootgrid.fa.js"></script>
<script src="../js/jquery.bootgrid.js"></script>
<script src="../js/mark_and_comment.js"></script>
<script src="../js/jquery.rating-2.0.js"></script>
</body>
</html>

