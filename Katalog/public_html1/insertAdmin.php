<?php
include "databaseconnect.php";
session_start();
$conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'],$_SESSION['BazaDan']);
if($conn->connect_error){
    
    die("Ошибка: " . $conn->connect_error);
}
$POl="БД подключена успешно";
echo ("<script>console.log('".$POl."');</script>");
$sql = "INSERT INTO swiper ( Zagolov, InfoSlader,File,IDAdmin) VALUES ('".$_POST['Zagolov']."','".$_POST['InfoSlaider']."','".$_FILES["filename"]["name"]."','".$_SESSION['idAdmin']."');";
if($conn->query($sql)){
    echo "Данные успешно добавлены ";
} else{
    echo "Ошибка: " . $conn->error;
}
$conn->close();
if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK)
{
    $name = $_FILES["filename"]["name"];
    move_uploaded_file($_FILES["filename"]["tmp_name"], $name);
    echo "Файл загружен ";
    echo "<button><a href='Admin.php'> Выход</a></button>"; 
}
?>