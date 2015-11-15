<?php
$link = mysqli_connect('localhost', 'root', '', 'campus') or die("Error " . mysqli_error($link));
$query="SET NAMES 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
                        $res = $link->query($query);
                        $query="SET CHARACTERS SET 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
                        $res = $link->query($query);
if(isset($_POST['passwd']))
{
$value=md5($_POST['passwd']);
$login=($_COOKIE['login']);
if (mysqli_query($link,"update users set passwd='$value' where login='$login'")) {
			echo <<<_END
                     <script>
alert("Ваш пароль успешно изменен!")
</script>
<script>
document.location.replace("http://localhost/campus/userProfile.php");
</script>
_END;
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




?>