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

    <!-- Cтили-->
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
            <a class="navbar-brand" href="../index.php">Портал общежития НИЯУ МИФИ</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="../index.php">ГЛАВНАЯ</a>
                </li>
                <li>
                    <a href="../dashboard/index.php">ДОСКА ОБЪЯВЛЕНИЙ</a>
                </li>
                <li class="active">
                    <a href="../services/index.php">УСЛУГИ</a>
                </li>
            </ul>
            <?php
                include("../lib/log.php");
                include("../lib/check_serv.php");
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
                    <a class="btn-group-au" href="/campus/registration/registration.php">РЕГИСТРАЦИЯ</a>
                </li>
                <li id="auth_and_reg2" style="display: none;">
                    <a class="btn-group-au" data-toggle="modal" data-target="#myModal" href="#myModal">АВТОРИЗАЦИЯ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--Меню END-->
<!-- Модальное окно подтверждения -->
<div id="confirmedModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Подтвердить выполнение</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label class="control-label">Оценка</label>
                        <textarea class="form-control" id="mark" name="mark"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Комментарий</label>
                        <textarea class="form-control" id="comment" name="comment"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="button" id="btn_confirmed" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Модальное окно жалобы -->
<div id="complainModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Пожаловаться</h4>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label class="control-label">Комментарий</label>
                        <textarea class="form-control" id="complain" name="complain"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="button" id="btn_complained" class="btn btn-primary">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Контейнер. Центральная часть-->
<div class="container">

    <div class="span3">
        <div class="card">
            <a class="btn btn-default" href="../services/index.php">Добавить заявку</a>
            <a class="btn btn-default" href="../services/mine.php">Просмотр моих заявок</a>
            <a class="btn btn-default" href="../services/all.php">Просмотр всех заявок</a>
        </div>
        <br/>


        <table id="grid-basic" class="table table-hover table-responsive table-bordered" width="100%">
            <thead>
                <th data-visible="false" data-column-id="id"><strong>id</strong></th>
                <th rowspan="3" data-column-id="category"><strong>Категория</strong></th>
                <th rowspan="3" data-column-id="description"><strong>Описание</strong></th>
                <th rowspan="3" data-column-id="ordate"><strong>Дата и время обслуживания</strong></th>
                <th rowspan="3" data-column-id="address"><strong>Адрес</strong></th>
                <th rowspan="3" data-column-id="author"><strong>Автор заявки</strong></th>
                <th rowspan="3" data-column-id="date_create"><strong>Дата и время добавления заявки</strong></th>
                <th rowspan="3" data-column-id="state"><strong>Состояние заказа</strong></th>
                <th rowspan="3" data-column-id="performer"><strong>Исполнитель заказа</strong></th>
                <th rowspan="3" data-column-id="commands" data-formatter="commands" data-sortable="false">Действия</th>
            </thead>
        </table>
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
<!-- Пол END-->
<!-- JavaScript. Для быстрой загрзуки помещайте в конце страницы, указав в начале скрипт jQuery-->
<script src="../js/jquery2.4.1.js"></script>
<script src="../js/moment-with-locales.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/moment-with-locales.min.js"></script>
<script src="../js/bootstrap-datetimepicker.min.js"></script>
<script src="../js/bootstrap-tab.js"></script>
<script src="../js/right-bar.js"></script>
<script src="../js/jquery.bootgrid.js"></script>
<script src="../js/jquery.rating-2.0.js"></script>
<script src="../js/services/mine.js"></script>

</body>
</html>