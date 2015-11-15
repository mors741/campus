<?php

if(!isset($_SESSION))
	session_start();

$link = mysqli_connect('localhost','root','','campus') or die("Ошибка при соединении с базой данных.." . mysqli_error($link));

if(isset($_POST['add_order']) && isset($_SESSION['login'])) {
	$query = "SELECT id FROM users WHERE login='" . $_SESSION['login'] . "';" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
	$result = $link->query($query);
	$myrow = mysqli_fetch_array($result);
	if (empty($myrow['id'])) {
		echo '<script> alert("Такого быть не должно!") </script>';
	}
	$owner = $myrow['id'];
	$serv = $_POST['address'];
	$description = $_POST['comment'];
	$ordate = $_POST['ordate'];
	$timeint = $_POST['timeint'];
	$state = 'waiting';
	$date_create = date("Y-m-d H:i:s");

	$query="SET NAMES 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
	$res = $link->query($query);
	$query="SET CHARACTERS SET 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
	$res = $link->query($query);

	$query = "INSERT INTO orders(owner,performer,description,serv,ordate,timeint,state,date_create) VALUES('$owner','1','$description','$serv','$ordate','$timeint','$state','$date_create')" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
	$result1 = $link->query($query);
	if ($result1 == true){
		echo '<script> alert("Ваша заявка добавлена.") </script>';
	}
	else {
		echo '<script> alert("При добавлении возникли ошибки.") </script>';
	}
}
else {
	echo '<script> alert("Зарегистрируйтесь.") </script>';
}
// НЕЛЬЗЯ ТАК ДЕЛАТЬ!!! КАК ПОТОМ ВЫХОДИТЬ НА УДАЛЕННЫЙ СЕРВЕР!!!
echo '<script>
		document.location.replace("http://localhost/campus/");
	</script>';
?>