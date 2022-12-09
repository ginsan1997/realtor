<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>




<?php if (!$_SESSION['login']){?> 
    <div class="centerDiv">   
<div class="registerForm" >
        Регистрация
        <form action="" method="post" id="registerForm">
            <input type="text" class="inputAuth" name="login" placeholder="login" required>
            <input type="text" class="inputAuth" name="password" placeholder="password" required>
            <input type="text" class="inputAuth" name="email" placeholder="email" required>
            <button type="submit" id="reg" class="btnAuth">Регистрация</button>
        </form>
    </div>

    <div class="loginForm" >
        Авторизация
        <form action="" method="post" id="loginForm">
            <input type="text" class="inputAuth" name="login" placeholder="login" required>
            <input type="text" class="inputAuth" name="password" placeholder="password" required>
            <button type="submit" id="log" class="btnAuth">Вход</button>

        </form>
</div></div>
        <?php }?>


        <div class="twoBlocks">
        <?php if ($_SESSION['login']){?>
           <div class="blockAccount"> 
            <div class="enterLogin"> Hello <?php echo $_SESSION['login'] ?> <a href="exit.php">Выйти</a></div>
             <?php  if($_SESSION['login'] === 'Admin'){
            echo "<div class='enterRealtor'> <a href='/realtor.php'>Войти в режим Риэлтора</a></div>";

}?></div>
        <?php }?>

        <div class="formBlock">
            <form action="" method="post">
                <div class="textHouse">Введите номер дома</div>
                <input type="text" name="numHouse" class="inputText" placeholder="Номер дома">
                <div class="btn_submit"><button class="btnSearch" type="submit">Найти</button></div>
            </form>
        </div>
        </div>

        
        <form class="sort" action="" method="get">
        <div class="textSort">Сортировать</div>
            <div class="buttonDiv">
                <button class="btn_sort1" name="upper" type="submit">по возрастанию</button>
                <button class="btn_sort" name="downer" type="submit">по убыванию</button>
            </div>
        </form>
        <div class="mainBlock" >
            <div class="blockHeader">
                    <div class="headerTable">Фото</div>
                    <div class="headerTable">Номер объекта</div>
                    <div class="headerTable">Адрес</div>
                    <div class="headerTable">Описание</div>
                    <div class="headerTable">Цена</div>
                </div>
            <?php include "dataHouses.php"?>
        </div>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript">
            $(document).ready(function () {
            $("#registerForm").on("submit", function () {
            $.post('register.php', $('#registerForm').serialize(), function(data, status){

            });
            });
            }); 

            $(document).ready(function () {
            $("#loginForm").on("submit", function () {
            $.post('login.php', $('#loginForm').serialize(), function(data, status){

            });
            });
            }); 

      </script>
    </div>
</body>
</html>
