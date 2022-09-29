<?php
    include "databaseconnect.php";
    session_start();
    $conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'], $_SESSION['BazaDan']);
    $Output = "SELECT * FROM otzov where Smotr = '1' limit 3; ";
 if($result6 = $conn->query($Output)){
    
    foreach($result6 as $row6){echo "<div class='DemoOtzov'>";
    echo "<p>".$row6['FIO']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row6['Data']."</p>";
    echo "<p>".$row6['OtzovPol']."</p></br>";
    echo "</div>";
}

}
else{
    echo "Ошибка: " . $conn->error;
}

?>