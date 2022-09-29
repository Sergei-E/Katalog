<!DOCTYPE html>
<html>

<head>
    <title>Главная страница</title>
    <link type="text/css" href="style2.css" rel="stylesheet" />
    <link type="text/css" href="style2admin5.css" rel="stylesheet" />
    <meta charset="utf-8">
</head>

<body>

    <header>

        <div id="FullPole">
            <div id="LeftPole">
                <div class="Contact">
                    <p id="HomeTelefon"><img id="IconHomeTelefon" src="free-icon-telephone-159832.png" align="center"> +7(912)115-23-44</p>
                </div>
                <div class="Contact">
                    <p id="SotovTelefon"><img id="IconSotovTelefon" src="free-icon-mobile-phone-545245.png" align="center">+7(912)345-33-65</p>
                </div>
            </div>
            <div id="FonLogo">
                <img id="Logo" src="Logo.png"><?php
            session_start();
            include "databaseconnect.php";
            session_start();
            $conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'], $_SESSION['BazaDan']);
            $sql = 'SELECT * From admin where login="'.$_SESSION['LoginSot2'].'";';
            if($result = $conn->query($sql))
            {
                foreach($result as $row)
                {
                echo "<p id='FIOAdmin'>Админ: ".$row['FIO']."</p>";
                echo "<a id='FIOAdmin' href='Autor.php'>Выход</a></li>";
                $_SESSION['idAdmin']=$row['ID'];
                }
            }
            else{
                echo "Ошибка: " . $conn->error;
                }
            ?>
            </div>
            <div id="RightPole">
                <p id="Adress">Иркутск ул. Паленова д. 19</p>
            </div>
            
        </div>
        <main>
            <p><a href="Catalog.html">Каталог товаров</a>
                <a href="Otzov.html">Отзывы</a>
                <a href="KontactInform.html">Контактная информация</a></p>
        </main>
    </header>
    <article>
        <h1>Отзывы покупателей</h1>
        <hr>

        <form id="form1" method="post">
    <?php
 include "databaseconnect.php";
 session_start();
 $conn = new mysqli($_SESSION['LocHos'], $_SESSION['Polzov'], $_SESSION['Password'],$_SESSION['BazaDan']);
 if($conn->connect_error){
     
     die("Ошибка: " . $conn->connect_error);
 }
 $POl="БД подключена успешно";
 echo ("<script>console.log('".$POl."');</script>");
 $Output = "SELECT * FROM otzov Where Smotr = '0'";
 if($result = $conn->query($Output)){
    echo "<table><tr><th>ФИО</th><th>Телефон</th><th>Почта</th><th>Отзыв пользователя</th><th>Дата добавления</th><th></th></tr>";
     foreach($result as $row){
        echo "<tr>";
        echo "<td>".$row["FIO"]."</td>";
        echo "<td>".$row["Telefon"]."</td>";
        echo "<td>".$row["Pohta"]."</td>";
        echo "<td>".$row["OtzovPol"]."</td>";
        echo "<td>".$row["Data"]."</td>";
        
        echo "<td><a href='update.php?Id=" . $row["Id"] . "'>Изменить</a></td>";
        echo "</tr>";
        }
        echo "</table>";
 }
 else{
     echo "Ошибка: " . $conn->error;
 }
    ?>
        </form><hr><h1>Слайдер</h1>
<div id="swiper">

    <form method="post" enctype="multipart/form-data" action="insertAdmin.php">
    <table>
        <tr>
            <td><label> Загаловок:</label></td>
            <td><input id="Zagolov" type="Text" name="Zagolov"></td>
        </tr>
        <tr>
            <td><label>Описание:</label></td>
            <td><textarea type="Text" name="InfoSlaider"></textarea></td>
        </tr>
        <tr>
           <td><label>Фон:</label></td>
            <td><input id="FileFon" type="file" name="filename"></td>
        </tr>
    </table>
    <div id="Inp">
        <input id="Otp"   type="submit">
    </div>
    
</form>
</div>
</article>


    
    <footer>
        <div id="FullFooter">
            <div class="PoleFooter">
                <p id="PoleLeft"><a href="Catalog.html">Каталог товаров</a></p>
            </div>
            <div class="PoleFooter">
                <p id="PoleCenter">СОЦИАЛЬНЫЕ СЕТИ</p>
                <a href="https://ok.ru/"><img class="IconSeti" src="free-icon-odnoklassniki-3291683.png" alt="instagram"></a>
                <a href="https://vk.com/"><img class="IconSeti" src="free-icon-vk-reproductor-2150.png" alt="vk"></a>
                <a href="https://www.viber.com/ru/"><img class="IconSeti" src="free-icon-viber-3938056.png" alt="viber"></a>
            </div>
            <div class="PoleFooter">
                <p id="PoleRight">Иркутск ул. Паленова д.19</p>
            </div>
        </div>
    </footer>
</body>

</html>