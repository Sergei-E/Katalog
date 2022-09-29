<?php
    include "databaseconnect.php";
    session_start();
    $conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'], $_SESSION['BazaDan']);
    $Output = "SELECT * FROM swiper ; ";
 if($result6 = $conn->query($Output)){
   /*echo '<div class="swiper-wrapper">';*/
    foreach($result6 as $row6){
    echo '<div class="swiper-slide">';
    echo '<img src="'.$row6['File'].'">';
    echo '<p>'.$row6['Zagolov'].'</p>';
    echo '<p class="InfoSlaid">'.$row6['InfoSlader'].'</p>';
    echo '</div>';
}
/*echo '</div>';
echo '<div class="swiper-pagination"></div>';
echo '<div class="swiper-button-prev"></div>';
echo '<div class="swiper-button-next"></div>';
echo '<div class="swiper-scrollbar"></div>';*/
}
else{
    echo "Ошибка:" . $conn->error;
}

?>

