<?php
$link = mysqli_connect('localhost','root','','campus');
$login = trim(strtolower($_POST['login']));
$query = "SELECT id FROM users WHERE login = '$login' LIMIT 1";
$result = $link->query($query);
$num = $result->num_rows;
echo $num ;
