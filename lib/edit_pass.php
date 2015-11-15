<?php
$link = mysqli_connect('localhost', 'root', '', 'campus') or die("Error " . mysqli_error($link));
$query="SET NAMES 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
                        $res = $link->query($query);
                        $query="SET CHARACTERS SET 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
                        $res = $link->query($query);
if(isset($_POST['value']))
{
$value=md5($_POST['value']);
$login=($_COOKIE['login']);
$query="SELECT id FROM users WHERE passwd='$value' AND login='$login'";
$result = $link->query($query);
$num = $result->num_rows;
echo $num ;
}

?>