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
        <link rel="stylesheet" type="text/css" href="CSS/dropdown.css" />	
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="CSS/content.css" >
        <link rel="stylesheet" type="text/css" href="CSS/datepicker3.min.css" />
        <link rel="stylesheet" type="text/css" href="CSS/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" type="text/css" href="CSS/button.css" />
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
                        <li class="active">
                            <a href="services.php">УСЛУГИ</a>
                        </li>
                    </ul>
                    <?php
                    include("lib/log.php");
                    include("lib/check_serv.php");
                    ?>
                </div>
            </div>
        </nav>
        <!--Меню END-->
        <!-- Контейнер. Центральная часть-->
        <div class="container">

            <div class="span3">
                <form method = "post" action = "lib/serv.php">
                    <div class="control-group">
                        <label for="service">Выберите тип оказываемой услуги</label>
                        <div class="controls">
                            <select name="service" id="service" class="form-control" onchange="showButtons(document.getElementById('service').value, $('#datetimepicker1').data('date'))">
                                <option value="" selected="selected">Выберите услугу</option>
                                <option value="1">Сантехник</option>
                                <option value="2">Электрик</option>
                                <option value="3">Плотник</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <br/><label for="comment">Комментарий к заявке</label>
                        <textarea class="form-control" rows="4" name="comment" id="comment" placeholder="Комментарий к заявке"></textarea>
                    </div>
                    <div class="control-group form-group">
                        <label for="date">Выберите дату оказания услуги</label>
                        <div class="form-group">
                            <div class="input-group date" id="datetimepicker1">
                                <input type="text" Name="ordate" Id="ordate" class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <input type="number" name="timeint" id="timeint" value="1" style="display:none"/> 
                    <div id="time" selectedValue="1" class=" btn-group" data-toggle = "buttons" data-toggle="buttons" >				
                    </div>
                    <br/>
                    <br/>
                    <input type="submit"  class="btn btn-primary" value="Отправить" name="add_order"/>
                </form>
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
        <script src="js/moment-with-locales.min.js"></script>
        <script src="js/bootstrap-datetimepicker.min.js"></script>
        <script src="js/bootstrap-tab.js"></script>	
        <script src="js/dropdown.js"></script>
        <script>
                                $(function () {
                                    $('#datetimepicker1').datetimepicker({
                                        pickTime: false,
                                        language: 'ru',
                                        defaultDate: moment().add('d', 1).toDate(),
                                        daysOfWeekDisabled: [0, 6],
                                        minDate: moment().add('d', 1).toDate(),
                                        maxDate: moment().add('d', 30).toDate()
                                    });
                                });
        </script>
        <script>
            function showButtons(serv, date) {
                if (serv == "") {
                    document.getElementById("time").innerHTML = "";
                    return;
                } else {
                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else {
                        // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            document.getElementById("time").innerHTML = "<label for='time'>Выберите удобный промежуток времени</label><br/>" + xmlhttp.responseText;
                        }
                    };
                    xmlhttp.open("GET", "lib/serv_buttons.php?serv=" + serv + "&date=" + date.substr(6, 4) + "-" + date.substr(3, 2) + "-" + date.substr(0, 2), true);
                    //alert("serv_buttons.php?serv="+serv+"&date="+date.substr(6, 4)+"-"+date.substr(3, 2)+"-"+date.substr(0, 2));
                    xmlhttp.send();
                }
            }
        </script>
    </body>
</html>