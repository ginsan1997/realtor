<?php 
$conn = new PDO("mysql:host=localhost;port=3306;dbname=realt", "root", "");
session_start(); 
$login = $_SESSION['login'];
$yourHouse = $conn->query("SELECT * FROM `houses` WHERE `owner` = '$login'")->fetchAll();
foreach ( $yourHouse as $row) {
    $name_obj = $row['name_obj'];
    $adress = $row['adress'];
    $description = $row['description'];
    $price = $row['price'];
    $img = $row['img'];
    $id = $row['id'];
}

// Добавление новой записи
if (isset($_POST['addNewData']) ) {
            
    $nameObj = $_POST['name_obj'];
    $adress = $_POST['adress'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $nameFile= $img;
            if ($_FILES && $_FILES["image"]["error"]== UPLOAD_ERR_OK){
            $nameFile = "img/".$_FILES["image"]["name"];
            move_uploaded_file($_FILES["image"]["tmp_name"], $nameFile);
            echo "Файл загружен";
        }
    $AddNewHouse = $conn->query("INSERT INTO `houses` ( `name_obj`, `adress`, `description`, `price`, `img`, `owner`) VALUES ('$nameObj', '$adress', '$description', '$price', '$nameFile', '$login');");
    header("location:".$_SERVER['HTTP_REFERER']) ;
    } 


     // Обновление записи

    $edit_name = $_POST['edit_name'];
    $edit_adress = $_POST['edit_adress'];
    $edit_description = $_POST['edit_description'];
    $edit_price = $_POST['edit_price'];
    $edit_image = $_POST['edit_image'];
    $get_id = $_POST['edit'];
    $filename= $img;
    if (isset($_POST['edit-submit'])) {
       
                
                    if ($_FILES && $_FILES["edit_image"]["error"]== UPLOAD_ERR_OK )
                    {
                    $filename = "img/".$_FILES["edit_image"]["name"];
                    move_uploaded_file($_FILES["edit_image"]["tmp_name"], $filename);
                    echo "Файл загружен";
                        
                }
                    
        $sqlUpdate = "UPDATE houses SET name_obj=?, adress=?, description=?, price=?, img = ?, owner=? WHERE id=?";
        $querys = $conn->prepare($sqlUpdate);
        $querys->execute([$edit_name, $edit_adress, $edit_description, $edit_price, $filename, $login,  $get_id]);
        header("location:".$_SERVER['HTTP_REFERER']) ;
        }
        // Удаление
        if (isset($_POST['delete-submit'])) {
            $get_id = $_POST['delete'];
            $sqldel = "DELETE FROM houses WHERE id=?";
            $query = $conn->prepare($sqldel);
            $query->execute([$get_id]);
            header("location:".$_SERVER['HTTP_REFERER']) ;
        }
                  


                         
                        
                   