
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный Кабинет Риэлтора</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include "realtordata.php";
session_start(); 
$login = $_SESSION['login'];
if($_SESSION['login'] === 'Admin'){
    $login = $_SESSION['login'];
    echo "<div class='enterLogin'>Добро пожаловать ". $login . ' в кабинет Риэлтора</div>'
    ?>
    <div class="enterLogin">  <a href="exit.php">Выйти</a></div>
    <div class="centerDiv">
   <div class="simpleText">   Чтобы добавить новую запись, заполните все поля 
<form action="" class="formReal" method="post" enctype="multipart/form-data">
                  <input class="inputTextReal" type="text" name="name_obj" placeholder="Номер Объекта" required>
                  <input class="inputTextReal" type="text" name="adress" placeholder="Адрес" required> 
                  <input class="inputTextReal" type="text" name="description" placeholder="Описание" required>
                  <input class="inputTextReal" type="text" name="price" placeholder="Цена" required>
                  <input  type="file" name="image" required>
                  <button  class="newBtn" type="submit" name="addNewData" >Добавить запись</button>
                  </form> 
                  </div>
                  <div class="simpleTextHome"> Ваш список домов </div>
<?php

            $conn = new PDO("mysql:host=localhost;port=3306;dbname=realt", "root", "");
            $yourHouse = $conn->query("SELECT * FROM `houses` WHERE `owner` = '$login'")->fetchAll();
            foreach ( $yourHouse as $row) {
                $name_obj = $row['name_obj'];
                $adress = $row['adress'];
                $description = $row['description'];
                $price = $row['price'];
                $img = $row['img'];
                $id = $row['id'];


                echo '
                
                <div class="mainBlockReal">

            
                  <div class="blockFlat">
                      <div class="imgfirst"><img src="'.$img.'" alt=""></div>
                      <div class="first">'.$name_obj.'</div>
                      <div class="second">'.$adress.'</div>
                      <div class="third">'.$description .'</div>
                      <div class="fourth">'.$price.'</div>
                  </div></div>
                  
                
                  <form action="" method="post" enctype="multipart/form-data">
                  <input class="inputTextReal" type="text" value = "'.$name_obj.'" name="edit_name" placeholder="Номер Объекта">
                  <input class="inputTextReal" type="text" value = "'.$adress.'" name="edit_adress" placeholder="Адрес">
                  <input class="inputTextReal" type="text" value = "'.$description.'" name="edit_description" placeholder="Описание">
                  <input class="inputTextReal" type="text" value = "'.$price.'" name="edit_price" placeholder="Цена">
                  <input  type="file" name="edit_image" value = "'.$row['id'].'">
                  <input class="inputTextReal" type="hidden" value = "'.$row['id'].'" name="edit">
                   <button  class="newBtn" type="submit" name ="edit-submit">Обновить</button>
                   <form class="formReal" action="" method="post" enctype="multipart/form-data">
                   <input type="hidden" value = "'.$row['id'].'" name="delete">
                   <button  class="newBtn" type="submit" name="delete-submit">Удалить запись</button>
                 
                    </form> 
                     </form> 
                 

                      ';
                }

      
?>
<?php  
} else {
    header("location:/");
}



?>
</div>

</body>
</html>




