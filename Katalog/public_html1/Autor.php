<!DOCTYPE html>
<html>
<head>
<title> Авторизация</title>
<meta charset="utf-8" />
<link type="text/css" href="author.css" rel="stylesheet"/>
</head>
<body>
<header>
    
</header>
    <form method="POST">
<div id="Oblact">
    <div class="Pole"><h1>АВТОРИЗАЦИЯ</h1></div>
    <div class="Pole"><p>Логин: <br> <input type="text" name="LoginSot2"/></p></div>
    <div class="Pole"><p>Пароль: <br> <input type="password" name="PasswordSot1"/></p></div>
    <div class="Pole"><p><input id="Vhod" type="submit" value="Войти"></p></div>
</div>
<?php
include "databaseconnect.php";
session_start();
$conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'],$_SESSION['BazaDan']);
if($conn->connect_error){
    
    die("Ошибка: " . $conn->connect_error);
}
$POl="БД подключена успешно";
echo ("<script>console.log('".$POl."');</script>");
$LoginSot=$_POST['LoginSot2'];
$_SESSION['LoginSot2']=$LoginSot;
$PasswordSot=$_POST["PasswordSot1"];
$sql = "SELECT * FROM admin";
if($result = $conn->query($sql)){
    foreach($result as $row){
         if( $row["login"] == $_POST['LoginSot2'] && $row["Password"] == $_POST['PasswordSot1']){
            $Po="Верно";
            echo ("<script>console.log('php_string:".$Po."');</script>");
            echo "<script>window.location = 'Admin.php';</script>";
         }
         else{
            $Po="Неверно";
            echo ("<script>console.log('php_string:".$Po."');</script>");
         }     
    }
    $result->free();
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
?>
</form>
</body>
</html>