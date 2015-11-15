<?php

$link = mysqli_connect('localhost','root','','campus') or die("Ошибка при соединении с базой данных.." . mysqli_error($link));

if(isset($_POST['register'])){
	$login=$_POST['login'];
	$password=md5($_POST['pass']);
	$name=$_POST['name'];
	$surname=$_POST['surname'];
	$yes=$_POST['yes'];
	if ($yes=="nouser") {
		$home = 0;
		$room = 0;
		$user="local";
	}
	else
	{
		if(isset($_POST['home']))
		{
			$home=$_POST['home'];
			$room=$_POST['room'];
			$user="campus";
		}
	}
	if (isset($_SESSION['role']) && ($_SESSION['role'] == "admin" || $_SESSION['role'] == "moder")) {
		$user=$_POST["select_role"];
	}
	$query="SET NAMES 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
	$res = $link->query($query);
	$query="SET CHARACTERS SET 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
	$res = $link->query($query);
	$query = "SELECT id FROM users WHERE login='$login'" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
	$result = $link->query($query);
	$myrow = mysqli_fetch_array($result);
	if (!empty($myrow['id'])) {
		echo ('<div class="m_auth m_error">Извините, введённый вами логин<br> уже зарегистрирован.<br>Введите другой логин</div>');
	}
	else {

		$query = "INSERT INTO users(login,passwd,name,surname,role,home,room) VALUES('$login','$password','".$name."','$surname','$user','$home','$room')" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
		$result1 = $link->query($query);
		if ($result1 == true && $user == 'staff'){
			$sid = $_POST['select_post'];
			$query = "SELECT id FROM users WHERE login='$login'" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
			$result = $link->query($query);
			$myrow = mysqli_fetch_array($result);
			if (!empty($myrow['id'])) {
				$uid = $myrow['id'];
				$query = "INSERT INTO staff(uid,sid) VALUES('$uid','$sid')" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
				$result1 = $link->query($query);
			} 
			else {
				$result1 = false;
			}
		}
		if ($result1 == true){
			echo <<<_END
			<script>
			alert("Ваш аккаунт успешно создан!")
			</script>
_END;
			if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin" || $_SESSION['role'] != "moder") {
				echo <<<_END
				<script>
				document.location.replace("http://localhost/campus/");
				</script>
_END;
			}
			die();
		}
		else {
			echo <<<_END
			<script>
			alert("Ошибка при подключении базы даных!")
			document.write(history.back());
			</script>
_END;
		}
	}
}
