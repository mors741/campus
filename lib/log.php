<?php

$link = mysqli_connect('localhost', 'root', '', 'campus') 
        or die("Error " . mysqli_error($link));

session_start();

if ((!isset($_SESSION['login'])) && ($_SERVER['REQUEST_URI'] <> "/campus/index.php") && ($_SERVER['REQUEST_URI'] <> "/campus/registration.php")) {
    echo "<script>alert(\"Для доступа к данной странице необходимо авторизироваться.\");</script>";
    echo "<script>setTimeout(\"location.href = '/campus/index.php';\",500);</script>";
    exit();
}


if (isset($_POST['enter'])) {
    $query = "SELECT passwd AS password FROM users WHERE login='" . $_POST['login'] . "';" 
            or die("Ошибка при выполнении запроса.." . mysqli_error($link));
    $result = $link->query($query);
    $user_data = mysqli_fetch_array($result);
    $result->close();
    if ($_POST['login'] == "admin@campus.mephi.com") 
            $_SESSION['admin'] = 1;
    if ($user_data['password'] == md5($_POST['password'])) {
            $_SESSION['login'] = $_POST['login'];
        if (isset($_POST['memory'])) {
                setcookie("login", $_POST['login'], time() + 60 * 60 * 24 * 7); // 7 day
        }
        echo ('<div class="m_auth m_success">Добро пожаловать, ' . $_SESSION["login"] . '!</div>');
    } else {
        echo '<div class="m_auth m_error">Неверный логин или пароль</div>';
    }
}


if (isset($_POST['logout'])) {
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    if (isset($_COOKIE['login']) && !empty($_COOKIE['login'])) {
        @setcookie('login', $_COOKIE['login'], time() - 60 * 60 * 24 * 7 * 7);
        unset($_COOKIE['login']);
    }
}


if (isset($_SESSION['login']) || (isset($_COOKIE['login']) && !empty($_COOKIE['login']))) {
    $query = "SET NAMES 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
    $res = $link->query($query);
    $query = "SET CHARACTERS SET 'utf8'" 
            or die("Ошибка при выполнении запроса.." . mysqli_error($link));
    $res = $link->query($query);
    if (!isset($_SESSION['login'])) {
        $_SESSION['login'] = $_COOKIE['login'];
    }
    $query = "SELECT u.*, s.post FROM users as u LEFT JOIN staff as s ON u.id = uid WHERE login='" . $_SESSION['login'] . "';" 
            or die("Ошибка при выполнении запроса.." . mysqli_error($link));;
    $result = $link->query($query);
    $user_data = mysqli_fetch_array($result);
    $result->close();
    $_SESSION['role'] = $user_data['role'];
    
    echo '

		<ul class="nav navbar-nav navbar-right">
                   <li>
			<a type=button class="account btn-group-au">' . $_SESSION["login"] . '&nbsp;&nbsp;
                            <img src="../campus/pictures/arrow_w.png"/>
                        </a>
</li>
<li>
<div class="submenu" style="display: none; ">
                    <ul class="root">
			<li>
                            <a href="../campus/profile/index.php">Личный кабинет</a>
                        </li>
			<li>
                            <form method="post" action="index.php">
				<input type="submit" name="logout" value="Выйти"/>
                            </form>
			</li>
		</ul>
</div>
</li>
</ul>

				
	';
} else {
    echo '<ul class="nav navbar-nav navbar-right">
            <li>
		<a class="btn-group-au" href="registration.php">РЕГИСТРАЦИЯ</a>
            </li>
            <li>
		<a class="btn-group-au" data-toggle="modal" data-target="#myModal" href="#myModal">АВТОРИЗАЦИЯ</a>
            </li>
	</ul>';
}

                    