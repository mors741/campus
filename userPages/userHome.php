<?php
echo
'<div class="col-sm-2 col-md-2">
    <br/>';
if ($user_data['picture']=='')
{
  echo '<img src="../campus/Pictures/no_photo.jpg" alt="" class="img-rounded img-responsive" />';  
}
else
{
  echo '<img src="'.$user_data['picture'].'" alt="" class="img-rounded img-responsive" />';
}
echo '
</div>
<div class="col-sm-4 col-md-4">
    <p> 
    <br/>
    <label for="login">E-Mail: </label> '.$user_data['login'].'
    <br/>  
    <label for="surname">Фамилия: </label> '.$user_data['surname'].'
    <br/>
    <label for="name">Имя:</label> '.$user_data['name'];

if ($user_data['patronymic'] != '') {
    echo '
    <br/>
    <label for="patronymic">Отчество: </label> '.$user_data['patronymic'];
    }
if ($user_data['role'] == 'staff') {
    echo '
    <br/>
    <label for="post">Должность: </label> '.$user_data['post'];
    }
if ($user_data['gender'] != '') {
    echo '
    <br/>
    <label for="gender">Пол: </label> '.$user_data['gender'];
    }
if ($user_data['bdate'] != '') {
    echo '
    <br/>
    <label for="bdate">Дата рождения: </label> '.$user_data['bdate'];
    }
if ($user_data['contacts'] != '') {
    echo '
    <br/>
    <label for="contacts">Контакты: </label> '.$user_data['contacts'];
                                                    }
if ($user_data['home'] != 0) {
    echo '<br/><label for="address">Корпус: </label> ';
    echo $user_data['home'];
}

if ($user_data['room'] != 0) {
    echo '
    <br/>
    <label for="room">Комната: </label>'.$user_data['room'];
}
echo '</p>
</div>';
