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
    <link rel="stylesheet" type="text/css" href="CSS/dropdown.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/content.css">
    <link rel="stylesheet" type="text/css" href="CSS/button.css"/>
    <link rel="stylesheet" type="text/css" href="CSS/message.css"/>
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
                    <a href="services/index.php">УСЛУГИ</a>
                </li>
            </ul>
            <?php
            include("lib/log.php"); //Включение кнопок авторизации и регистрации
            ?>
        </div>
    </div>
</nav>
<!--Меню END-->

<!--Модальное окно авторизации-->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">АВТОРИЗАЦИЯ</h4>
            </div>
            <div class="modal-body">
                <div style="padding-top:30px" class="panel-body">
                    <form role="form" method="post" action="index.php" class="form-horizontal">
                        <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span>
                            <input type="email" class="form-control" id="login" name="login"
                                   placeholder="Введите email"/>
                        </div>
                        <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-lock"></i>
                                    </span>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Пароль"/>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="memory" id="memory" value="memory"/> Запомнить
                            </label>
                        </div>
                        <br>
                        <button type="submit" name="enter" class="btn btn-primary">Отправить</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!--Модальное окно авторизации END-->

<!--Контент. Центральная часть-->
<div class="container">
    <!--Cладй-шоу-->
    <div class="hero-unit">
        <div id="myCarousel" class="carousel slide">
            <!-- Индикаторы-->
            <ol style="margin-bottom: 1%" class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Индикаторы END-->
            <!-- Враппер для слайдов -->
            <div class="carousel-inner">
                <div class="active item" data-slide-number="0"><img class="img-rounded" src="Pictures/1.jpg">

                    <div class="carousel-caption"
                         style='background: rgba(0, 0, 0, 0.4) none repeat scroll 0px 0px; border-radius: 6px'>
                        <h2>Нужна тех. помощь?</h2>

                        <p>Просто сделай заказ услуг</p>
                    </div>
                </div>

                <div class="item" data-slide-number="1"><img class="img-rounded" src="Pictures/2.jpg">

                    <div class="carousel-caption"
                         style='background: rgba(0, 0, 0, 0.4) none repeat scroll 0px 0px; border-radius: 6px'>
                        <h2>Размещай объявления</h2>

                        <p>И оценивай объявления других пользователей</p>
                    </div>
                </div>

                <div class="item" data-slide-number="2"><img class="img-rounded" src="Pictures/3.jpg">

                    <div class="carousel-caption"
                         style='background: rgba(0, 0, 0, 0.4) none repeat scroll 0px 0px; border-radius: 6px'>
                        <h2>Помогай администрации общежития</h2>

                        <p>Оценивай качество исполнения услуг</p>
                    </div>
                </div>

            </div>
            <!-- Враппер для слайдов END-->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"></a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"></a>
        </div>
    </div>
    <!--Cладй-шоу END-->
    <!-- Блоки с информацией -->
    <div class='row'>
        <div class="sindex1">
            <h2>Широкие возможности</h2>

            <p> Регистрируйся и получай доступ к таким сервисам как объявления и услуги а также оценка услуг.</p>
        </div>
        <div class="sindex2">
            <h2>Эффективная полезность</h2>

            <p>Сервис полезен для студентов и сотрудников МИФИ, также администрации и персонала общежития</p>
        </div>
    </div>
    <!-- Блоки с информацией END-->
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
<script src="js/jquery2.4.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/dropdown.js"></script>
<script>
    $('.carousel').carousel({
        interval: 5000
    });

    $('#modal').modal('show');
</script>
<!-- JavaScript. Для быстрой загрзуки помещайте в конце страницы, указав в начале скрипт jQuery END-->
</body>
</html>
