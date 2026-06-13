<?php
$errors = [];

function validateLoginForm(array $arrpost): array
{
    $errors = [];

    if(empty($arrpost['useremail'])){
        $errors['useremail'] = 'Поле email должно быть заполнено';

    }
    if(empty($arrpost['password'])){
        $errors['password'] = 'Поле password должно быть заполнено';

    }

    return $errors;
}

$validateErrors = validateLoginForm($_POST);

if(empty($validateErrors)){

    $useremail = $_POST['useremail'];
    $password = $_POST['password'];

    $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email'=>$useremail]);
    $user = $stmt->fetch();

    if ($user === false){
        $errors['useremail'] = 'email incorrect';
    }else{
        $passwordDb = $user['password'];

        if (password_verify($password, $passwordDb)){

            session_start();
            $_SESSION['userId'] = $user['id'];
            header("Location: /catalog");
            exit;

        }else{
            $errors['useremail'] = 'email or password incorrect';
        }
    }

}
require_once "./login/get_login.php";

