<?php
session_start();
header('Content-Type: text/html; charset=utf-8'); 
$link = mysqli_connect('localhost', 'root', '', 'campus') or die("Error " . mysqli_error($link));
$query = "SET NAMES 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
$res = $link->query($query);
$query = "SET CHARACTERS SET 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
$res = $link->query($query);

if(isset($_POST['id'])&& (isset($_SESSION['login']))) {
    $id = trim($_POST['id']);
    $value = trim($_POST['value']);
    $login = $_SESSION['login'];
    if ($id == 'home' && $value == '0') {
        $result = mysqli_query($link, "SELECT * FROM users WHERE login='$login'");
        $user_data = mysqli_fetch_array($result);
        if ($user_data['role'] == 'campus') {
            mysqli_query($link, "UPDATE users SET " . $id . "='$value', room ='0', role='local' WHERE login='$login' and role='campus'");
        } else {
            mysqli_query($link, "UPDATE users SET " . $id . "='$value', room ='0' WHERE login='$login' ");
        }
    } else {
        mysqli_query($link, "UPDATE users SET " . $id . "='$value' WHERE login='$login'");
    }
    print $value;
}
?>