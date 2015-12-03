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
    <link rel="stylesheet" type="text/css" href="/campus/css/dropdown.css" />	
    <link rel="stylesheet" type="text/css" href="/campus/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/campus/css/content.css" >
    <link rel="stylesheet" type="text/css" href="/campus/css/button.css" />
    <link rel="stylesheet" type="text/css" href="/campus/css/message.css"/>
    <link rel="stylesheet" type="text/css" href="/campus/css/style.css" />
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
                include("../lib/log.php"); 
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
                                    <a href="../campus/profile/index.php">Личный кабинет</a>
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

    <!--Модальное окно авторизации-->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">АВТОРИЗАЦИЯ</h4>
                </div>
                <div class="modal-body">
                    <div style="padding-top:30px" class="panel-body" >
                        <form role="form" method="post" action="index.php" class="form-horizontal">
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-user"></i>
                                </span>
                                <input type="email" class="form-control" id="login" name="login" placeholder="Введите email"/>
                            </div>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon">
                                    <i class="glyphicon glyphicon-lock"></i>
                                </span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Пароль"/>
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
        <div class="span3">
            <div class="panel-heading">
                <h4 class="modal-title">РЕГИСТРАЦИЯ</h4>
            </div>
            <form action="" method="post" id="register-form">
                <!--Первый блок регистрации-->
                <div class="span-reg">
                    <div class="control-group form-group">
                        <label for="login">Логин (email НИЯУ МИФИ)</label>
                        <div class="form-group">
                            <input type="text" name="email" id="email" class="form-control" placeholder="email"/>
                        </div>
                    </div>

                <div class="control-group form-group">
                    <label for="password">Пароль</label>
                    <div class="form-group">
                        <input type="password" name="pass" id="pass" class="form-control"  placeholder="Пароль" rel='tooltip'/>
                    </div>
                </div>
                <div class="control-group form-group">
                    <label for="password">Подтвердите пароль</label>
                    <div class="form-group">
                        <input type="password" name="rpass" id="rpass" class="form-control"  placeholder="Пароль"/>
                    </div>
                </div>
                <div class="control-group form-group">
                    <label for="surname">Фамилия</label>
                    <div class="form-group">
                        <input type="text" name="surname" id="surname" class="form-control" placeholder="Фамилия"/>
                    </div>
                </div>
                
                <div class="control-group form-group">
                    <label for="name">Имя</label>
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Имя"/>
                    </div>
                </div>
            </div>
    <!--Первый блок регистрации END-->
    <!--Второй блок регистрации-->
    
    <div class="span-reg">
        <div class="control-group form-group">
            <label for="yes">Проживаете в общежитии?</label>
            <div class="form-group">
                <label>
                    <input type="radio" name="yes" id="yes" value="user"  title="Да"/>Да
                </label>
                <label>
                    <input type="radio" name="yes" id="no" value="nouser"  title="Нет"/>Нет
                </label>
                <br>
                <label for="yes" class="error" generated="true" style="display:none"></label>
            </div>
        </div>
        <div id="user" style="display:none; width:100%">
            <div class="control-group form-group">
                <label for="home">Адрес</label>
                <div class="form group">
                    <select name="home" id="home" class="form-control">
                    </select>
                </div>
            </div>
            <div class="control-group form-group" >
                <label for="room">Квартира</label>
                <div class="form-group">
                    <input type="text"  value="" name="room" id="room" class="form-control"/>
                </div>
            </div>
            
        </div>
  
    </div>
    

        
    <!--Второй блок регистрации END-->
    <!--Третий блок регистрации-->
    <br>
    <div style="margin-top: 480px; ">
              <div class="control-group form-group" >
						<label><input type="checkbox"  value="agree" name="agree" />  </label>
						<label>Я прочитал и согласен с правилами <a href="#?w=500"  rel="popup_name" class="poplight">пользовательского соглашения</a></label>
						<label for="agree" class="error" generated="true" style="display:none"></label>
						</div>
        <hr>
        <div id="popup_name" class="popup_block">
           <h1>Пользовательское соглашение</h1>
           <p>Добро пожаловать на Портал Общежития НИЯУ МИФИ, Интернет-ресурс, с помощью которого организована система получения различного рода услуг от Персонала (коммунальные услуги), так и от других Пользователей (купля-продажа, помощь по учебе и т.д.).</p>
           <p>Пользование Портала возможно только на условиях, изложенных в настоящем Пользовательском соглашении. Если Вы не согласны с его условиями, то Вам следует немедленно прекратить использование Портала. Использование Портала означает, что Вы согласны с условиями настоящего Пользовательского соглашения.</p>
           <h2>1. Термины и определения</h2>
           <p>1.1. Для целей настоящего Пользовательского соглашения нижеуказанные термины имеют следующие значения:<p>
               <ul>
                   <li>Администратор – авторизованное на Портале лицо, в обязанности которого входит техническая поддержка и управление Порталом в целом.</li>
                   <li>Доска объявлений – веб-страница Портала, содержащая созданные пользователями Объявления.</li>
                   <li>Заявка – созданное на Портале заявление на оказание коммунальной услуги представителем Персонала.</li>
                   <li>Объявление – извещение о чём-либо, предложение купли/продажи или оказания услуги, связанное с Общежитием.</li>
                   <li>Пользователь — лицо, прошедшее процедуру регистрации, получившее индивидуальный логин и/или пароль, а также имеющее свой Профиль. Для целей Пользовательского соглашения под Пользователем понимается также лицо, которое не прошло процедуру регистрации, но осуществляет доступ к Порталу и/или использует и/или использовало его. Любое лицо, осуществляющее доступ к Порталу, этим автоматически подтверждает, что оно полностью согласно с положениями настоящего Пользовательского соглашения, и что в отношении него применимы требования, установленные настоящим Пользовательским соглашением</li>
                   <li>Портал – рассматриваемый веб-сервис для оказания услуг, связанных с Общежитием.</li>
               </ul>
               <h2>2. Предмет и общие положения Пользовательского соглашения</h2>
               <p>2.1. Настоящее Пользовательское Соглашение (далее — Соглашение) устанавливает правила и условия пользования Порталом и размещения на нем Информации и представляет собой договор между Пользователем и Администрацией. </p>
               <p>2.2. Доступ к Порталу, использование Портала и/или совершение любых иных действий на Портале Пользователем означает, что Пользователь принимает и обязуется соблюдать все условия настоящего Соглашения. Регистрация Пользователя на Портале возможна только при дополнительном подтверждении Пользователем принятия настоящего Соглашения.</p>
               <h2>3. Обязательства Пользователя</h2>
               <p>3.1. Пользователь соглашается не предпринимать действий, которые могут рассматриваться как нарушающие российское законодательство или нормы международного права, в том числе в сфере интеллектуальной собственности, авторских и/илисмежных правах, а также любых действий, которые приводят или могут привести к нарушению нормальной работы Портала и сервисов Портала.</p>
               <p>3.2. Использование материалов Портала без согласия правообладателей не допускается (статья 1270 Г.К РФ). Для правомерного использования материалов Портала необходимо заключение лицензионных договоров (получение лицензий) от Правообладателей.</p>
               <p>3.3. При цитировании материалов Портала, включая охраняемые авторские произведения, ссылка на Портал обязательна (подпункт 1 пункта 1 статьи 1274 Г.К РФ).</p>
               <p>3.4. Комментарии и иные записи Пользователя на Портале не должны вступать в противоречие с требованиями законодательства Российской Федерации и общепринятых норм морали и нравственности.</p>
               <p>3.5. Пользователь предупрежден о том, что Администрация Портала не несет ответственности за посещение и использование им внешних ресурсов, ссылки на которые могут содержаться на Портале.</p>
               <p>3.6. Пользователь согласен с тем, что Администрация Портала не несет ответственности и не имеет прямых или косвенных обязательств перед Пользователем в связи с любыми возможными или возникшими потерями или убытками, связанными с любым содержанием Портала, регистрацией авторских прав и сведениями о такой регистрации, товарами или услугами, доступными на или полученными через внешние Порталы или ресурсы либо иные контакты Пользователя, в которые он вступил, используя размещенную на Портале информацию или ссылки на внешние ресурсы.</p>
               <h2>4. Иные положения</h2>
               <p>4.1. Настоящее Соглашение регулируется и толкуется в соответствии с законодательством Российской Федерации. Вопросы, не урегулированные настоящим Соглашением, подлежат разрешению в соответствии с законодательством Российской Федерации. Все возможные споры, вытекающие из отношений, регулируемых настоящим Соглашением, разрешаются в порядке, установленном действующим законодательством Российской Федерации, по нормам российского права. Везде по тексту настоящего Соглашения, если явно не указано иное, под термином «законодательство» понимается как законодательство Российской Федерации, так и законодательство места пребывания Пользователя.</p>
               <p>4.2. Пользователь и Администрация Портала будут пытаться решить все возникшие между ними споры и разногласия путем переговоров. В случае невозможности разрешить споры и разногласия путем переговоров они подлежат рассмотрению в соответствующем суде по месту нахождения Администрации Портала.</p>
               <p>4.3. Ввиду безвозмездности услуг, оказываемых в рамках настоящего Соглашения, нормы о защите прав потребителей, предусмотренные законодательством Российской Федерации, не могут быть применимыми к отношениям между Пользователем и Администраций Портала.</p>						
               <p>4.4. Ничто в Соглашении не может пониматься как установление между Пользователем и Администраций Портала агентских отношений, отношений товарищества, отношений по совместной деятельности, отношений личного найма, либо каких-то иных отношений, прямо не предусмотренных Соглашением.</p>
               <p>4.5. Если по тем или иным причинам одно или несколько положений настоящего Соглашения будут признаны недействительными или не имеющими юридической силы, это не оказывает влияния на действительность или применимость остальных положений Соглашения.</p>
               <p>4.6. Бездействие со стороны Администрации Портала в случае нарушения Пользователем либо иными пользователями положений Соглашений не лишает Администрацию Портала права предпринять соответствующие действия в защиту своих интересов позднее, а также не означает отказа Администрации Портала от своих прав в случае совершения в последующем подобных либо сходных нарушений.</p>
               <p>4.7. Настоящее Соглашение составлено на русском языке и в некоторых случаях может быть предоставлено Пользователю для ознакомления на другом языке. В случае расхождения русскоязычной версии Соглашения и версии Соглашения на ином языке, применяются положения русскоязычной версии настоящего Соглашения.</p>
               <p>4.8. Настоящее Соглашение может быть изменено Администрацией Портала в любое время без какого-либо специального уведомления. Новая редакция Соглашения вступает в силу с момента ее опубликования на Портале, если иное не предусмотрено новой редакцией Соглашения. </p>
           </div>
           <div class="control-group form-group">
               <input type="submit" id="send" class="btn btn-primary" value="Зарегистрировать" name="register"/>
           </div>
       </div>
       <!--Третий блок регистрации END-->
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


<?php
include('lib/reg.php');
?>

<!-- JavaScript. Для быстрой загрзуки помещайте в конце страницы, указав в начале скрипт jQuery-->
<script src="/campus/js/jquery2.4.1.js"></script>
<script src="/campus/js/jquery.validate.js"></script>
<script src="/campus/js/validators.js"></script>
<script src="/campus/js/bootstrap.min.js"></script> 
<script src="/campus/js/jquery.pstrength-min.1.2.js"></script>
<script src="/campus/js/right-bar.js"></script>
<script src="/campus/js/jquery.agreement.js"></script>
<script src="/campus/js/dm-modal.js"></script>
<script src="/campus/js/common-edit.js"></script>      
<script src="/campus/js/user/registration.js"></script>
<!-- JavaScript. Для быстрой загрзуки помещайте в конце страницы, указав в начале скрипт jQuery END-->       
</body>
</html>