<?php

if (isset($_POST["id"]) && isset($_POST["msg"]) ) {

  	$msg = $_POST['msg'];
  	$id = $_POST['id'];

	$link12 = mysqli_connect('localhost', 'root', '', 'campus') 
        or die("Error " . mysqli_error($link12));

    $query12 = "SET NAMES 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link12));
    $res12 = $link12->query($query12);
    $query12 = "SET CHARACTERS SET 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link12));
    $res12 = $link12->query($query12);
	
    $query12 = "UPDATE orders SET comment='$msg' WHERE id='$id'" 
     or die("Ошибка при выполнении запроса.." . mysqli_error($link12));
    
    $link12->query($query12)
    or die("Ошибка при выполнении запроса.." . mysqli_error($link12));

}
	

