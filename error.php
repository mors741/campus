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
    <link rel="stylesheet" type="text/css" href="/campus/css/button.css"/>
    <link rel="stylesheet" type="text/css" href="/campus/css/message.css"/>
    <!--Конец-->
</head>

<body>
<!--Меню-->
<nav class="navbar-inverse navbar-fixed-top" role="navigation">
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
                    <a href="/campus/">ГЛАВНАЯ</a>
                </li>
                <!--<li>
                    <a href="/campus/dashboard/">ДОСКА ОБЪЯВЛЕНИЙ</a>
                </li>-->
                <li>
                    <a href="/campus/services/">УСЛУГИ</a>
                </li>
            </ul>


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
                    <form role="form" method="post" action= "index.php" id="authform" class="form-horizontal">
                        <div style="margin-bottom: 25px" class="input-group">
                                    <span class="input-group-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                    </span>
                            <input type="email" class="form-control" id="authlogin" name="login"
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
                        <button type="submit" name="enter" class="btn btn-primary" onclick="log()">Отправить</button>
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

<div style=" width: 540px; padding: 10px;margin: auto; margin-top: 12%; color: white">
    <h2>У вас нет доступа к данной странице</h2>
</div>
<!-- JavaScript. Для быстрой загрзуки помещайте в конце страницы, указав в начале скрипт jQuery-->
<script src="/campus/js/jquery2.4.1.js"></script>
<script src="/campus/js/bootstrap.min.js"></script>
<script src="/campus/js/right-bar.js"></script>
<script src="/campus/js/log.js"></script>
<script>
    $('.carousel').carousel({
        interval: 5000
    });

    $('#modal').modal('show');
</script>
<!-- JavaScript. Для быстрой загрзуки помещайте в конце страницы, указав в начале скрипт jQuery END-->
</body>
</html>
