<?php
//if(session_status() !== PHP_SESSION_ACTIVE){
//    session_start();
//}
//
//if (!isset($_SESSION['userId'])) {
//    header("Location: /login");
//    exit;
//}
//function validateEditProfile(array $data): array
//{
//    $errors = [];
//
//    if(isset($data['name'])){
//        $name = $data['name'];
//        if(strlen($name) < 3){
//            $errors['name'] = "Имя короткое";
//        }
//    }
//
//    if(isset($data['email'])){
//        $name = $data['email'];
//        if(strlen($name) < 3){
//            $errors['email' ] = "email короткий";
//        }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
//            $errors['email'] = "некорректный email";
//        }
//    }else{
//        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
//        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
//        $stmt->execute(['email'=>$data['email']]);
//        $user = $stmt->fetch();
//
//        $userId = $_SESSION['userId'];
//        if ($user['id'] !== $userId){
//            $errors = "Этот Email уже занят";
//        }
//
//
//    }
//
//    return $errors;
//}
//
//$errors = validateEditProfile($_POST);
//
//if(empty($errors)){
//    $newName = $_POST['name'];
//    $newEmail = $_POST['email'];
//
//    $userId = $_SESSION['userId'];
//
//    $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
//    $stmt = $pdo->query("SELECT * FROM users WHERE id = $userId");
//    $userData = $stmt->fetch();
//
//    if($userData['name'] !== $newName){
//        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
//        $stmt = $pdo->prepare("UPDATE users SET name = :name WHERE id = $userId");
//        $stmt->execute(['name'=>$newName]);
//    }
//
//    if($userData['email'] !== $newEmail){
//        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
//        $stmt = $pdo->prepare("UPDATE users SET email = :email WHERE id = $userId");
//        $stmt->execute(['email'=>$newEmail]);
//    }
//    header("Location: /profile");
//    exit;
//}
//
//require_once './editProfile/editProfile_page.php';






