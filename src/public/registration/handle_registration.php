<?php

function validateRegistrationForm(array $arrpost){
    $errors = [];

    if(isset($arrpost['name'])){
        $name = $arrpost['name'];

        if(strlen($name) < 2){
            $errors['name'] = 'имя должно быть больше 2 символов';
        }
    }else{
        $errors['name'] = 'имя должно быть заполнено';
    }

    if(isset($arrpost['email'])){
        $email = $arrpost['email'];

        if(strlen($email) < 2){
            $errors['email'] = 'имя должно быть больше 2 символов';
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $errors['email'] = 'данные неверные';
        }
    }else{
        $errors['email'] = 'email должнен быть заполнен';
    }

    if(isset($arrpost['password'])){
        $password = $arrpost['password'];

        if (strlen($password) < 6 ){
            $errors['password'] = 'праоль должен быть больше 6 символов';
        } elseif ($confirm = $arrpost['confirm'] and $password !== $confirm){
            $errors['confirm'] = 'пароли не совподают';
        }
    }

    return $errors;


}



if (empty(validateRegistrationForm($_POST))){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
    $stmt->execute(['email'=>$email]);
    $count = $stmt->fetchColumn();

    if($count > 0){
        $errors['email'] = "Этот email уже зарегистрирован.";
        require_once './registration/get_registration.php';
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
    $stmt->execute(['name' => $name,'email' => $email,'password' => $hashedPassword]);

    header("Location: /login");




//    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
//    $stmt->execute(['email'=>$email]);
//
//    $data = $stmt->fetch();
//    print_r($data);

}

require_once './registration/get_registration.php';





