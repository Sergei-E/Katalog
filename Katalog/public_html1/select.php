
<?php
    include "databaseconnect.php";
    session_start();
    $conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'], $_SESSION['BazaDan']);
    $Output = "SELECT * FROM otzov where Smotr = '1' ; ";
 if($result6 = $conn->query($Output)){
    
    foreach($result6 as $row6){echo "<div class='DemoOtzov'>";
    echo "<p>".$row6['FIO']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row6['Data']."</p>";
    echo "<p>".$row6['OtzovPol']."</p></br>";
    echo "</div>";
    /*$_GET['OutputMes'] = $row6['Message'];
    $_GET['OutputUse'] = $row6['NameUser'];*/
    /*$OutputMes = $_GET['OutputMes'];
    $OutputUse = $_GET['OutputUse'];*/
}

}
else{
    echo "Ошибка: " . $conn->error;
}

?>