 <?php
                    $link = mysqli_connect('localhost', 'root', '', 'campus') or die("Error " . mysqli_error($link));
                    session_start();

                    $_SESSION['timeout'] = 1200;  //Поменьше

                    if (isset($_SESSION['login'])) {
                         $_SESSION['last_activity'] = time(); // update last activity time stamp
                    }

                    if (isset($_POST['enter'])) {
                        $query = "SELECT passwd AS password FROM users WHERE login='" . $_POST['login'] . "';" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
                        $result = $link->query($query);
                        $user_data = mysqli_fetch_array($result);
                        $result->close();
                        if ($_POST['login'] == "admin@mephi.com")
                            $_SESSION['admin'] = 1;
                        if ($user_data['password'] == md5($_POST['password'])) {
                            $_SESSION['login'] = $_POST['login'];
                            setcookie("login", $_POST['login'], time() + 86400); // 1 day
                            echo ('<div class="m_auth m_success">Добро пожаловать, ' . $_SESSION["login"] . '!</div>');
                        } else {
                            echo '<div class="m_auth m_error">Неверный логин или пароль</div>';
                        }
                    }

                    if (isset($_POST['logout'])) {
                        session_unset();     // unset $_SESSION variable for the run-time 
                        session_destroy();   // destroy session data in storage
                    }

                    if (isset($_SESSION['login'])) {
                        $query="SET NAMES 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
                        $res = $link->query($query);
                        $query="SET CHARACTERS SET 'utf8'" or die("Ошибка при выполнении запроса.." . mysqli_error($link)); 
                        $res = $link->query($query);
						$query = 
							"SELECT
								u.*,
								s.post
							FROM
								users as u
								LEFT JOIN staff as s
								ON u.id = uid
							WHERE login='" . $_SESSION['login'] . "';";
                        //$query = "SELECT u.*, s.post FROM users as u, staff as s WHERE login='" . $_SESSION['login'] . "';" or die("Ошибка при выполнении запроса.." . mysqli_error($link));
                        $result = $link->query($query);
                        $user_data = mysqli_fetch_array($result);
                        $result->close();
                        $_SESSION['role'] = $user_data['role'];
                        // echo '<script> alert("$_SESSION["role"] = $user_data["role"];") </script>';
                        echo '<div id="sign-out">
								<div class="dropdown">
									<ul class="nav navbar-nav navbar-right">
										<li>
											<a class="account btn-group-au">' . $_SESSION["login"] . '&nbsp;&nbsp;<img src="Pictures/arrow_w.png"/></a>
										</li>
									</ul>
									<div class="submenu" style="display: none; ">
										<ul class="root">
											<li><a href="userProfile.php">Личный кабинет</a></li>
											<li>
												<form method="post" action="index.php">
													<input type="submit" name="logout" value="Выйти"/>
												</form>
											</li>
										</ul>
									</div>
								</div>				
							</div>';
                    } else {
                        echo '<ul class="nav navbar-nav navbar-right">
							<li>
								<a class="btn-group-au" href="registration.php">РЕГИСТРАЦИЯ</a>
							</li>
							<li>
								<button type="button" class="btn-group-au" data-toggle="modal" data-target="#myModal">АВТОРИЗАЦИЯ</button>
							</li>
						</ul>';
                    }
                    