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
        <link rel="stylesheet" type="text/css" href="../css/dash.css">
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
                        <li id="sign-out1" style="display: none;">
                            <a type=button class="account btn-group-au">
                                <span id="login"></span>
                                <img src="/campus/pictures/arrow_w.png"/>
                            </a>
                        </li>
                        <li>
                            <div class="submenu" style="display: none; ">
                                <ul class="root" id="sign-out2" style="display: none;">
                                    <li>
                                        <a href="/campus/profile/">Личный кабинет</a>
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
                <div class="card" style="margin-bottom: 2%">
                    <a class="btn btn-default" href="/campus/dashboard/index.php">Просмотр объявлений</a>
                    <a class="btn btn-default" href="/campus/dashboard/edit.php">Новое объявление</a>
                    <a class="btn btn-default" href="/campus/dashboard/all.php">Объявления для проверки</a> <!/--для модеров
                    и админов -->
                </div>
                <div class="container-fluid">
                    <div class="content-wrapper">	
                        <div class="item-container">	
                            <div class="col-md-7">
                                <div class="product col-md-7 service-image-left">

                                    <center>
                                        <img id="item-display" src="/campus/pictures/no_photo.jpg" alt=""></img>
                                    </center>
                                </div>

                                <div class="container service1-items col-sm-2 col-md-2 pull-left">
                                    <center>
                                        <a id="item-1" class="service1-item">
                                            <img src="/campus/pictures/no_photo.jpg" alt=""></img>
                                        </a>
                                        <a id="item-2" class="service1-item">
                                            <img src="/campus/pictures/no_photo.jpg" alt=""></img>
                                        </a>
                                        <a id="item-3" class="service1-item">
                                            <img src="/campus/pictures/no_photo.jpg" alt=""></img>
                                        </a>
                                    </center>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="product-title">Куплю стиральную машинку, недорого</div>
                                <div class="product-desc"><p id="dash-author"><strong>Автор: </strong>Долгач</p></div>
                                <div class="product-desc"><p id="dash-category"><strong>Категория: </strong>Покупка</p></div>
                                <div class="product-desc"><p id="dash-category"><strong>Добавлено: </strong>6.6.666 в 6:06</p></div>
                                <hr>
                                <div class="btn-group cart">
                                    <button type="button" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-share-alt"></span> 
                                        Откликнуться 
                                    </button>
                                </div>
                                <div class="btn-group wishlist">
                                    <button type="button" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove-circle"></span> 
                                        Пожаловаться
                                    </button>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="container-fluid">		
                        <div class="col-md-12 product-info">
                            <ul id="myTab" class="nav nav-tabs nav_tabs">
                                <li class="active"><a href="#service-one" data-toggle="tab">Описание</a></li>
                                <li><a href="#service-two" data-toggle="tab">Контакты</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade in active" id="service-one">
                                    <section class="product-info">
                                    </section>
                                </div>
                                <div class="tab-pane fade" id="service-two">
                                    <section class="product-info">							
                                    </section>
                                </div>
                            </div>
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
            <!-- Пол END-->
            <!-- JavaScript. Для быстрой загрзуки помещайте в конце страницы, указав в начале скрипт jQuery-->
            <script src="../js/jquery2.4.1.js"></script>
            <script src="../js/moment-with-locales.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/moment-with-locales.min.js"></script>
            <script src="../js/bootstrap-datetimepicker.min.js"></script>
            <script src="../js/bootstrap-tab.js"></script>
            <script src="../js/right-bar.js"></script>
    </body>
</html>