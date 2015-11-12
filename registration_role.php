<!doctype Html>
<!-- Saved From Url=(0041)http://mybootstrap.ru/examples/hero.html# -->
<html Lang="ru"><head><meta Http-equiv="content-type" Content="text/html; Charset=utf-8">
<meta Charset="utf-8">
<meta Name="viewport" Content="width=device-width, Initial-scale=1.0">
<meta Name="description" Content="">
<meta Name="author" Content="">

<!-- Le Styles -->
<link Href="css/bootstrap.css" Rel="stylesheet">
<link Href="css/content.css" Rel="stylesheet">


<script Src="js/jquery.js"></script>
<script Src="js/jquery2.4.1.js"></script>
<script Src="js/jquery.validate.js"></script>
<script Src="js/registration.js"></script>
<script Src="js/bootstrap.min.js"></script> 
<script Src="js/jquery.pstrength-min.1.2.js"></script>


</head>

<body>
    <?php
    include('/lib/reg_role.php');
    ?>
    <div Class="container">

      <!-- Main Hero Unit For A Primary Marketing Message Or Call To Action -->
      <div >
        <div Class="panel-heading"><h4 Class="modal-title">""ЭТОТ ФАЙЛ НЕ ИМЕЕТ СМЫСЛА. ВСЕ ЗАХАРДКОЖЕНО В userProfile.php ИЗ-ЗА НЕРАБОТОСПОСОБНОСТИ jsСКРИПТОВ ПОСЛЕ include. Добавление нового пользователя</h4></div>
        <form Action="" Method="post" Id="register-form">
            <div Class="span-reg">
                <div Class="control-group Form-group">
                    <label For="login">Логин (email НИЯУ МИФИ)</label>
                    <div Class="form-group">
                        <input Type="text" Name="login" Id="login" Class="form-control" Placeholder="email"/>

                    </div>
                </div>

                <div Class="control-group Form-group">
                    <label For="password">Пароль</label>
                    <div Class="form-group">
                        <input Type="password" Name="pass" Id="pass" Class="form-control"  Placeholder="пароль" Rel="tooltip"/>

                    </div>
                </div>

                <div Class="control-group Form-group">
                    <label For="password">Подтвердите пароль</label>
                    <div Class="form-group">
                        <input Type="password" Name="rpass" Id="rpass" Class="form-control"  Placeholder="пароль"/>
                    </div>
                </div>


                <div Class="control-group Form-group">
                    <label For="surname">Фамилия</label>
                    <div Class="form-group">
                        <input Type="text" Name="surname" Id="surname" Class="form-control" Placeholder="фамилия"/>
                    </div>
                </div>

                <div Class="control-group Form-group">
                    <label For="name">Имя</label>
                    <div Class="form-group">
                        <input Type="text" Name="name" Id="name" Class="form-control" Placeholder="имя"/>
                    </div>
                </div>
                <div Class="control-group Form-group" >
                    <label For="yes">Проживаете в общежитии?</label>
                    <div Class="form-group">
                        <label><input Type="radio" Name="yes" Id="yes" Value="user"  Title="да"/>Да</label>
                        <label><input Type="radio" Name="yes" Id="no" Value="nouser"  Title="нет"/>Нет</label>
                        <br>
                        <label For="yes" Class="error" Generated="true" Style="display:none"></label>
                    </div>
                </div>
                <div Id="user" Style="display:none">
                    <div Class="control-group Form-group">
                        <label For="home">Адрес</label>
                        <div Class="form Group">
                            <select Name="home" Id="home" Class="form-control">
                                <option Value="0" Selected="selected">(выберите Корпус Общежития)</option>
                                <option Value="1">ул. Москворечье Д.2 Корп 1</option>
                                <option Value="2">ул. Москворечье Д.2 Корп 2</option>
                                <option Value="3">ул. Москворечье, Д.19 Корп 3</option>
                                <option Value="4">ул. Москворечье, Д.19 Корп 4</option>
                                <option Value="5">ул. Кошкина Д.11 Корп. 1</option>
                                <option Value="6">ул. Шкулева Д.27 Ст 2</option>
                                <option Value="7">ул. Пролетарский Проспект Д. 8 Корп. 2</option>
                            </select>
                        </div>
                    </div>


                    <div Class="control-group Form-group" >
                        <label For="room">Квартира</label>
                        <div Class="form-group">
                            <input Type="text"  Value="" Name="room" Id="room" Class="form-control"/>
                        </div>
                    </div>
                </div>
                <label For="role">Роль:</label>
                <select Class="form-control" Id="role" Name ="select_role">
                    <option Value="admin">Администратор</option>
                    <option Value="staff">Персонал</option>
                </select>

                <br>
                <hr>
                <div Class="control-group Form-group">
                    <input Type="submit"  Class="btn Btn-primary" Value="зарегистрироваться" Name="register"/>
                </div>
            </div>
        </form>


    </div>
</div>
<!-- /container -->



</body>
</html>