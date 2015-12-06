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
    <link rel="stylesheet" type="text/css" href="/campus/css/dropdown.css"/>
    <link rel="stylesheet" type="text/css" href="/campus/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="/campus/css/content.css">
    <link rel="stylesheet" type="text/css" href="/campus/css/datepicker3.min.css"/>
    <link rel="stylesheet" type="text/css" href="/campus/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="/campus/css/button.css"/>
    <link rel="stylesheet" type="text/css" href="/campus/css/jquery.rating.css"/>
    <link rel="stylesheet" type="text/css" href="/campus/css/jquery.bootgrid.css"/>
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
            <a class="navbar-brand" href="/campus/index.php">Портал общежития НИЯУ МИФИ</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="/campus/">ГЛАВНАЯ</a>
                </li>
                <li>
                   <a href="/campus/dashboard/">ДОСКА ОБЪЯВЛЕНИЙ</a>
                </li>
                <li>
                    <a href="/campus/services/">УСЛУГИ</a>
                </li>
            </ul>
            <?php
            include("../lib/log.php"); //Включение кнопок авторизации и регистрации
            ?>
            <ul class="nav navbar-nav navbar-right">
                <li  id="sign-out1" style="display: none;">
                    <a type=button class="account btn-group-au">
                        <span id="login"></span>
                        <img src="/campus/pictures/arrow_w.png"/>
                    </a>
                </li>
                <li>
                    <div class="submenu" style="display: none; ">
                        <ul class="root" id="sign-out2" style="display: none;">
                            <li>
                                <a href="/campus/profile/index.php">Личный кабинет</a>
                            </li>
                            <li>
                                <input type="button" id="logout_btn" onclick="logout()" value="Выйти"/>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li id="auth_and_reg1" style="display: none;">
                    <a class="btn-group-au" href="/campus/registration/">РЕГИСТРАЦИЯ</a>
                </li>
                <li id="auth_and_reg2" style="display: none;">
                    <a class="btn-group-au" data-toggle="modal" data-target="#myModal" href="#myModal">АВТОРИЗАЦИЯ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--Меню END-->
<!-- Контейнер. Центральная часть-->
<div class="container">
    <div class="span3">
        <div class="row">
            <div class="card">
                <a class="btn btn-default" href="/campus/profile/">Личные данные</a>
                <a class="btn btn-default" href="/campus/profile/edit.php">Редактирование данных</a>
                <a class="btn btn-default" href="/campus/profile/favs.php">Закладки</a>
            </div>
            <div class="content">
                <div class="col-sm-2 col-md-2">
                    <br/>
                    <img id="picture" alt="" class="img-rounded img-responsive"/>
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
                        <label for="gender">Пол: </label>
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
<script src="/campus/js/jquery2.4.1.js"></script>
<script src="/campus/js/jquery.validate.js"></script>
<script src="/campus/js/jquery.pstrength-min.1.2.js"></script>
<script src="/campus/js/jquery.jeditable.js"></script>
<script src="/campus/js/jquery.maskedinput.min.js"></script>
<script src="/campus/js/jquery.jeditable.masked.js"></script>
<script src="/campus/js/passvalid.js"></script>
<script src="/campus/js/common-edit.js"></script>
<script src="/campus/js/upload_avatar.js"></script>
<script src="/campus/js/bootstrap.min.js"></script>
<script src="/campus/js/moment-with-locales.min.js"></script>
<script src="/campus/js/bootstrap-tab.js"></script>
<script src="/campus/js/bootstrap-datetimepicker.min.js"></script>
<script src="/campus/js/jquery.bootgrid.fa.js"></script>
<script src="/campus/js/jquery.bootgrid.js"></script>
<script src="/campus/js/mark_and_comment.js"></script>
<script src="/campus/js/jquery.rating-2.0.js"></script>
<script src="/campus/js/user/main.js"></script>
<script src="/campus/js/right-bar.js"></script>
</body>
</html>

