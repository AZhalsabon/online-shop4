<?php
namespace Controllers;


use Model\User;

class UserController extends BaseController
{

    private $userModel;
    public function __construct()
    {
        parent::__construct();
        $this->userModel = new User();
    }

    public function getRegistrate()
    {
        if ($this->authService->check()) {
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


            $result =  $this->userModel->getByEmail($email);

            if($result !== null){
                $errors['email'] = "Этот email уже зарегистрирован.";
                require_once '../Views/get_registration.php';
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);


            $this->userModel->addUserDb($name,$email,$hashedPassword);

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

            $result = $this->authService->auth($useremail,$password);

            if ($result === true){
                header("Location: /catalog");
                exit;
            }else{
                $errors['useremail'] = 'email or password incorrect';
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
        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }
        require_once '../Views/get_profile.php';
    }

    public function getDataProfile()
    {

        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }

//        $dataUser = $this->userModel->getBySessionId($_SESSION['userId']);
        $dataUser = $this->authService->getCurrentUser();

        require_once '../Views/get_profile.php';
    }

    public function getEditProfile()
    {
        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }
        require_once '../Views/edit_profile_page.php';
    }

    public function editProfile()
    {
        $errors = $this->validateEditProfile($_POST);

        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }

        if(empty($errors)){
            $newName = $_POST['name'];
            $newEmail = $_POST['email'];
            $user = $this->authService->getCurrentUser();

            require_once '../Model/User.php';


            if($user->getName() !== $newName){
                $this->userModel->updateNameById($newName, $user->getId());
            }

            if($user->getEmail() !== $newEmail){
                $this->userModel->updateEmailById($newEmail, $user->getId());
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

            $user =  $this->userModel->getByEmail($data['email']);

            if ($user->getId() !== $userId){
                $errors = "Этот Email уже занят";
            }
        }
        return $errors;
    }

    public function logout()
    {
        $this->authService->logout();
        header("Location: /login");
    }
}