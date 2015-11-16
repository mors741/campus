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
	$login = $_SESSION['login'];
	$owner = $myrow['id'];
	$serv = $_POST['service'];
	$description = $_POST['comment'];
	$ordate = date('Y-m-d',strtotime($_POST['ordate']));
	$timeint = $_POST['timeint'];
	$state = 'waiting';
	$date_create = date("Y-m-d H:i:s");
	echo '<script> alert($ordate) </script>';
	// с привязкой к адресу по area
	/*$query =
	"SELECT staff_id
	FROM
		`area` AS A
		JOIN `staff` AS S
		ON A.staff_id = S.id
	WHERE
		A.address_id = (SELECT home FROM users WHERE login = '".$login."') AND
		S.sid = ".$serv." AND
		staff_id NOT IN
			(
				SELECT performer
				FROM `orders`
				WHERE
					ordate = '".$ordate."' AND
					timeint = ".$timeint."
			)
	ORDER BY RAND() LIMIT 1;";*/
	
	//  без привязки к адресу по area
	$query =
	"SELECT id AS staff_id
	FROM
		`staff`
	WHERE
		sid = ".$serv." AND
		id NOT IN
			(
				SELECT performer
				FROM `orders`
				WHERE
					ordate = '".$ordate."' AND
					timeint = ".$timeint."
			)
	ORDER BY RAND() LIMIT 1;";
	//echo $query;
	
	$result = $link->query($query);
	$freestuff = mysqli_fetch_array($result);
	$performer = $freestuff['staff_id'];
	$result->close();

	$query="SET NAMES 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
	$res = $link->query($query);
	$query="SET CHARACTERS SET 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
	$res = $link->query($query);
	
	

	$query = "INSERT INTO orders(owner,performer,description,serv,ordate,timeint,state,date_create) VALUES('$owner','$performer','$description','$serv','$ordate','$timeint','$state','$date_create')" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
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