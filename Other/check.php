<?php

$link = mysqli_connect('localhost','root','rayman_lara94','campus');

$login = trim(strtolower($_GET['login']));

if (mysql_query("SELECT id FROM users WHERE login = '$login' LIMIT 1"))
{
    echo 'false';
}
echo 'true';
