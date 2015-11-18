<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
$link = mysqli_connect('localhost', 'root', '', 'campus') or die("Error " . mysqli_error($link));
$query = "SET NAMES 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
$res = $link->query($query);
$query = "SET CHARACTERS SET 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
$res = $link->query($query);

if (isset($_POST['value']) && (isset($_SESSION['login']))) {
    $value = md5($_POST['value']);
    $login = ($_SESSION['login']);
    $query = "SELECT id FROM users WHERE passwd='$value' AND login='$login'";
    $result = $link->query($query);
    $num = $result->num_rows;
    echo $num;
} else {
    echo <<<_END
            <script>
                alert("Ошибка при подключении к БД");
            </script>
            <script>
                document.location.replace("../campus/userProfile.php");
            </script>
_END;
    die();
}
?>