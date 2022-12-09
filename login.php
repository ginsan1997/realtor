<?php 
    $conn = new PDO("mysql:host=localhost;port=3306;dbname=realt", "root", "");
    class loginUser {
    public $login = '';
    public $password = '';

    public function getLogin($login) {
        return $this->$login = $login;
    }

    public function getPass($password) {
        return $this->$password = $password;
    }
}


$login = New loginUser;
 $checkLogin = $login->getLogin($_POST['login']); //получаю логин
 $checkPass = $login->getPass($_POST['password']); // получаю пароль



 $dataLogin = $conn->query("SELECT * FROM users")->fetchAll();
 foreach ($dataLogin as $row) {
     
     if( $checkLogin===$row['login']  && $checkPass === $row['password']){
        echo "Вы вошли в систему";
        session_start();
        $_SESSION['login'] = $checkLogin;
         break;
     } else {
        "NO!";
     }
 }




$conn->null;

header('Location: /');

?>