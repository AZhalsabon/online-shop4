<?php

class UserController
{
    public function getRegistrate()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        require_once '../Views/get_registration.php';
    }

    public function registrate()
    {
        $errors = $this->validateRegistrationForm($_POST);
        if (empty($errors)){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            require_once '../Model/User.php';
            $userModel = new User();

            $result =  $userModel->getByEmail($email);

            if($result !== false){
                $errors['email'] = "Этот email уже зарегистрирован.";
                require_once '../Views/get_registration.php';
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            require_once '../Model/User.php';
            $userModel - new User();

            $userModel->addUserDb($name,$email,$hashedPassword);

            header("Location: /login");
        }
        require_once '../Views/get_registration.php';
    }

    private function validateRegistrationForm(array $arrpost){
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
    public function getLogin()
    {
        require_once '../Views/get_login.php';
    }

    public function login()
    {
        $errors = $this->validateLoginForm($_POST);

        if(empty($errors)){

            $useremail = $_POST['useremail'];
            $password = $_POST['password'];

            require_once '../Model/User.php';
            $userModel = new User();

            $result =  $userModel->getByEmail($useremail);

            if ($result === false){
                $errors['useremail'] = 'email incorrect';
            }else{
                $passwordDb = $result['password'];

                if (password_verify($password, $passwordDb)){
                    session_start();
                    $_SESSION['userId'] = $result['id'];
                    header("Location: /catalog");
                    exit;

                }else{
                    $errors['useremail'] = 'email or password incorrect';
                }
            }
        }
        require_once "../Views/get_login.php";
    }

    private function validateLoginForm(array $arrpost): array
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

    public function getProfile()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }
        require_once '../Views/get_profile.php';
    }

    public function getDataProfile()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }
        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        require_once '../Model/User.php';
        $userModel = new User();

        $dataUser = $userModel->getBySessionId($_SESSION['userId']);

        require_once '../Views/get_profile.php';
    }

    public function getEditProfile()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }
        require_once '../Views/edit_profile_page.php';
    }

    public function editProfile()
    {
        $errors = $this->validateEditProfile($_POST);

        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        if(empty($errors)){
            $newName = $_POST['name'];
            $newEmail = $_POST['email'];
            $userId = $_SESSION['userId'];

            require_once '../Model/User.php';
            $userModel = new User();

            $userData = $userModel->getBySessionId($userId);

            if($userData['name'] !== $newName){
                $userModel->updateNameById($newName, $userId);
            }

            if($userData['email'] !== $newEmail){
                $userModel->updateEmailById($newEmail, $userId);
            }

            header("Location: /profile");
            exit;
        }

        require_once '../Views/editProfile_page.php';

    }

    private function validateEditProfile(array $data): array
    {
        $errors = [];

        if(isset($data['name'])){
            $name = $data['name'];
            if(strlen($name) < 3){
                $errors['name'] = "Имя короткое";
            }
        }

        if(isset($data['email'])){
            $name = $data['email'];
            if(strlen($name) < 3){
                $errors['email' ] = "email короткий";
            }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "некорректный email";
            }
        }else{
            $userId = $_SESSION['userId'];

            require_once '../Model/User.php';
            $userModel = new User();

            $user =  $userModel->getByEmail($data['email']);

            if ($user['id'] !== $userId){
                $errors = "Этот Email уже занят";
            }
        }

        return $errors;
    }


}