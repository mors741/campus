<?php
$host = "127.0.0.1";
    $db_name = "campus";
    $login = "root";
    $password = "";
     
    $PDO = new PDO( 'mysql:host='.$host.';dbname='.$db_name, $login, $password );
    
    $PDO->query("SET NAMES 'utf-8'");
$uploaddir = './uploads/';
$file = $uploaddir . basename($_FILES['datafile']['name']); 
 
$ext = substr($_FILES['datafile']['name'],strpos($_FILES['datafile']['name'],'.'),strlen($_FILES['datafile']['name'])-1); 
$filetypes = array('.jpg','.gif','.bmp','.png','.JPG','.BMP','.GIF','.PNG','.jpeg','.JPEG');
 
if(!in_array($ext,$filetypes)){
  echo "<p>Данный формат файлов не поддерживается</p>";}
else{ 
  if (move_uploaded_file($_FILES['datafile']['tmp_name'], $file)) { 
    $session = $_COOKIE['login'];
    $result = $PDO->prepare("UPDATE users SET picture= :img WHERE login= :login");
    $result->execute(array(':login' => $session, ':img'=> $file));
    
    echo $file;
  } else {
    echo "error";
  }
}
?>