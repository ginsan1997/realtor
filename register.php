<?php
$conn = new PDO("mysql:host=localhost;port=3306;dbname=realt", "root", "");

class RegisterUser {
    public $login = '';
    public $password = '';
    public $email = '';


    public function getLogin($login) {
        return $this->$login = $login;
    }

    public function getPass($password) {
        return $this->$password = $password;
    }
    public function getEmail($email) {
        return $this->$email = $email;
    }

}

$register = New RegisterUser;
$login = $register->getLogin(trim($_POST['login'])); //получаю логин
$password =$register->getPass(trim($_POST['password']));
$email = $register->getEmail(trim($_POST['email']));


    $dataLogin = $conn->query("SELECT * FROM users")->fetchAll();
    $errLogin = 0;
    foreach ($dataLogin as $row) {
        
        if($row['login'] === $login && $row['email'] === $email){

            $errLogin++;
            break;
        };
    }

    if ($errLogin === 0){
        $sql = "INSERT INTO `users` (`login`, `password`, `email`) VALUES ('$login', '$password', '$email')";
        $conn->query($sql);
        session_start();
    } else {
        echo "Пользователь уже зарегистрирован";
    }



$conn->null;

header('Location: /');
