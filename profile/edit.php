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
я
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
            <a class="navbar-brand" href="/campus/">Портал общежития НИЯУ МИФИ</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="/campus/">ГЛАВНАЯ</a>
                </li>
                <!--<li>
                    <a href="/campus/dashboard/">ДОСКА ОБЪЯВЛЕНИЙ</a>
                </li>-->
                <li>
                    <a href="/campus/services/">УСЛУГИ</a>
                </li>
            </ul>
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
            <div id="links" class="card">
                <a class="btn btn-default" href="/campus/profile/">Личные данные</a>
                <a class="btn btn-default" href="/campus/profile/edit.php">Редактирование данных</a>
                <!--<a class="btn btn-default" onclick="alert('Страница в разработке')">Закладки</a>-->
            </div>
            <div class="content">
                <div class="col-sm-2 col-md-2">
                    <form action="" method="post" enctype="form-data" id="js-upload-form">
                        <div id="upload" style="background-size: cover; width:100px; height:100px;" class="img-rounded">
                        </div>
                        <div class="control-group form-group" style="margin-left: 40px">
                        <span class="btn btn-default btn-file"> Выбрать
                            <input type="file" id="js-upload-files" name="datafile" accept="image/jpeg,image/png,image/gif"/>
                        </span>
                        </div>
                    </form>
                </div>
                <div class="col-sm-8 col-md-6">
                    <fieldset>
                        <legend>Смена Пароля</legend>
                        <div id="check_passwd" >
                            <div class="control-group form-group">
                                <label id="password-error" class="error valid" generated="true"
                                style="display:none"></label>
                                <br/>
                                <label for="password">Старый пароль</label>

                                <div class="form-group">
                                    <input type="password" id="password" class="form-control" placeholder="Старый пароль"/>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <label for="passwd">Новый пароль</label>
                                <div class="form-group">
                                    <input type="password" id="passwd" name="passwd"
                                           class="form-control" placeholder="Новый пароль"/>
                                    <div id="passwd_new">
                                    </div>
                                </div>
                            </div>
                            <button id="update_pass" type="" onclick="update_password()" class="btn btn-primary">Обновить пароль</button>
                        </div>
                    </fieldset>
                    <br/>
                    <fieldset>
                        <legend> Ф.И.О.</legend>
                        <div class="control-group form-group">
                            <label id="name-error" class="error" generated="true" style="display:none"></label>
                            <br/>
                            <label for="surname">Фамилия</label>
                            <div class="form-group">
                                <input id="surname" class="editable">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label for="name">Имя</label>

                            <div class="form-group">
                                <input id="name" class="editable">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label for="patronymic">Отчество</label>

                            <div class="form-group">
                                <input id="patronymic" class="editable">
                            </div>
                        </div>
                    </fieldset>
                    <br/>
                    <fieldset>
                        <legend>Дополнительная информация</legend>
                        <div class="control-group form-group">
                            <label for="gender">Пол</label>
                            <div class="form-group">
                                <select id="gender">
                                    <option value = 'M'>мужской</option>
                                    <option value = 'Ж'>женский</option>
                                    <option value =  '-1'>не указан</option>
                                </select>
                                <br/>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label for="birthday">Дата рождения</label>

                            <div class="form-group">
                                <div class="input-group date" id="datetimepicker2">
                                    <input type="text" class="form-control" name="bdate" id="bdate" value="$bdate"/>
			                        <span class="input-group-addon">
                                         <span class="glyphicon glyphicon-calendar"></span>
			                        </span>
                                </div>
                                <label id="bdate_save" class="error" generated="true" style="display:none"></label>
                                <br/>
                            </div>
                        </div>
                    </fieldset>
                    <br/>
                    <fieldset>
                        <legend>Связь с Вами</legend>
                        <div class="control-group form-group">
                            <label for="contact">Контакты</label>

                            <div class="form-group">
                                <input class="editable_contact" id="contacts">
                                <br/>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label for="address">Адрес (корпус):</label>
                            <div class="form-group">
                                <select id = "home">
                                </select>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <label for="room">Номер комнаты (квартиры)</label>

                            <div class="form-group">
                                <input id="room" class="editable_room">
                            </div>
                            <br/>
                            <label id="room-error" class="error valid" generated="true" style="display:none"></label>
                        </div>
                    </fieldset>
                    <br/>
                    <button id="update" type="" onclick="document.location.reload()" class="btn btn-primary">Обновить информацию
                    </button>
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
<script src="/campus/js/user/edit.js"></script>
<script src="/campus/js/right-bar.js"></script>
<script src="/campus/js/profile.js"></script>

</body>
</html>

