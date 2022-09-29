
<!DOCTYPE html>
<html>
<head>
<title>Обновление</title>
<meta charset="utf-8" />
</head>
<body>
<?php
include "databaseconnect.php";
 session_start();
$conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'],$_SESSION['BazaDan']);
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
// если запрос GET
if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["Id"]))
{
    $userid = $conn->real_escape_string($_GET["Id"]);
    $sql = "SELECT * FROM otzov WHERE Id = '".$userid."';";
    if($result = $conn->query($sql)){
        if($result->num_rows > 0){
            foreach($result as $row){
                $userFIO = $row["FIO"];
                $userTelefon = $row["Telefon"];
                $userPohta = $row["Pohta"];
                $userOtzovPol = $row["OtzovPol"];
                $userData = $row["Data"];
                $userSmotr = $row["Smotr"];
            }
            echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='Id' value='$userid' />
                    <p>ФИО:
                    <input type='text' name='FIO' value='$userFIO' /></p>
                    <p>Телефон:
                    <input type='text' name='Telefon1' value='$userTelefon' /></p>
                    <p>Почта:
                    <input type='text' name='Pohta1' value='$userPohta' /></p>
                    <p>Отзыв:
                    <input type='text' name='OtzovPol1' value='$userOtzovPol' /></p>
                    <p>Время:
                    <input type='date' name='Data1' value='$userData' /></p>
                    <p>Опубликовать:
                    <select name='Smotr1'>
                    <option value='1' >Да</option>
                    <option value='0' >Нет</option>
                    </select>
                    </p>
                    <input type='submit' value='Сохранить'>
            </form>";
        }
        else{
            echo "<div>Пользователь не найден</div>";
        }
        $result->free();
    } else{
        echo "Ошибка: " . $conn->error;
    }
}
elseif (isset($_POST["Id"]) && isset($_POST["FIO"]) && isset($_POST["Telefon1"]) && isset($_POST["Pohta1"]) && isset($_POST["OtzovPol1"]) && isset($_POST["Data1"]) && isset($_POST["Smotr1"])) {
      
    $userid = $conn->real_escape_string($_POST["Id"]);
    $userFIO2 = $conn->real_escape_string($_POST["FIO"]);
    $userTelefon2 = $conn->real_escape_string($_POST["Telefon1"]);
    $userPohta2 = $conn->real_escape_string($_POST["Pohta1"]);
    $userOtzovPol2 = $conn->real_escape_string($_POST["OtzovPol1"]);
    $userData2 = $conn->real_escape_string($_POST["Data1"]);
    $userSmotr2 = $conn->real_escape_string($_POST["Smotr1"]);
    $sql = "UPDATE otzov SET FIO = '".$userFIO2."', Telefon = '".$userTelefon2."',Pohta ='".$userPohta2."', OtzovPol = '". $userOtzovPol2."', Data ='". $userData2.  "', Smotr = '".$userSmotr2."' , IDAdmin = '".$_SESSION['idAdmin']."' WHERE Id = '".$userid."';";
    if($result = $conn->query($sql)){
        header("Location: Admin.php");
    } else{
        echo "Ошибка:". $conn->error;
    }
}
else{
    echo "Некорректные данные";
}
$conn->close();
?>
</body>
</html>