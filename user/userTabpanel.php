<?php
echo '<ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Личная информация</a>
                            </li>
                            <li role="presentation">
                                <a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Редактировать</a>'; 

if ($user_data['role'] != 'local') {
    echo '
                            <li role="presentation">
                                <a href="#services" aria-controls="services" role="tab" data-toggle="tab">Мои заявки</a>
                            </li>';
}
if ($user_data['role'] != 'staff') {
echo '
                            <li role="presentation">
                                <a href="#favourites" aria-controls="favourites" role="tab" data-toggle="tab">Закладки</a>
                            </li>';
}
if ($user_data['role'] != 'staff') {
    echo '
                            <li role="presentation">
                                <a href="#myAds" aria-controls="myAds" role="tab" data-toggle="tab">Мои объявления</a>
                            </li>';
}

if ($user_data['role'] == 'moder') {
    echo '
                            <li role="presentation">
                                <a href="#tools" aria-controls="tools" role="tab" data-toggle="tab">Инструменты модератора</a>
                            </li>';
}
if ($user_data['role'] == 'admin') {
    echo '
                            <li role="presentation">
                                <a href="#tools" aria-controls="tools" role="tab" data-toggle="tab">Инструменты администратора</a>
                            </li>';
}
if ($user_data['role'] == 'admin' || $user_data['role'] == 'moder' || $user_data['role'] == 'manage' || $user_data['role'] == 'staff') {
    echo '
                            <li role="presentation">
                                <a href="#staff" aria-controls="staff" role="tab" data-toggle="tab">Персонал</a>
                            </li>';
}
echo '</ul>';
?>

