<?php
$link = mysqli_connect('localhost', 'root', '', 'campus') or die("Error " . mysqli_error($link));
$query="SET NAMES 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
                        $res = $link->query($query);
                        $query="SET CHARACTERS SET 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
                        $res = $link->query($query);
if($_POST['id'])
{
$id=trim($_POST['id']);
$value=trim($_POST['value']);
$login=$_COOKIE['login'];
mysqli_query($link,"update users set ".$id."='$value' where login='$login'");
print $value;
}

?>