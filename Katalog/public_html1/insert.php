<?php
include "databaseconnect.php";
session_start();
$conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'],$_SESSION['BazaDan']);
if($conn->connect_error){
    
    die("Ошибка: " . $conn->connect_error);
}
$POl="БД подключена успешно";
echo ("<script>console.log('".$POl."');</script>");
$FioPol2 = $_POST['FioPol1'];
$TelefonPol2 = $_POST['TelefonPol1'];
$EMailPol2 = $_POST['EMailPol1'];
$OtzovPolPol2 = $_POST['OtzovPolPol1'];
$sql = "INSERT INTO otzov ( FIO, Telefon, Pohta, OtzovPol, Data, Smotr,IDAdmin) VALUES ('".$FioPol2."','".$TelefonPol2."','".$EMailPol2."','".$OtzovPolPol2."','".date('Y-m-d')."','0','1');";
if($conn->query($sql)){
    echo "Данные успешно добавлены";
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();


$to  = "kostya.puhlyak@yandex.ru" ; 

$subject = "Вам пришло вообщение с сайта"; 

$message = ' Комментарий: '.$OtzovPolPol2.' от пользователя: '.$FioPol2;

$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
$headers .= "From: test1234edfg@yandex.ru.com\r\n"; 

$retval = mail($to, $subject, $message, $headers); 

 
 
 if( $retval == true ) {
 echo "Письмо успешно отправлено";
 }else {
 echo "Письмо не отправлено. Ошибка: " . $result;
 }
?>