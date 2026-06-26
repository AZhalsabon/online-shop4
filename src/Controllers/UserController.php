<?php
namespace Controllers;


use DTO\AuthDTO;
use Model\User;
use Request\EditProfileRequest;
use Request\LoginRequest;
use Request\RegistrateRequest;

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

    public function registrate(RegistrateRequest $request)
    {
        $errors = $request->validate();
        if (empty($errors)){

            $name = $request->getName();
            $email = $request->getEmail();
            $password = $request->getPassword();


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

    public function getLogin()
    {
        require_once '../Views/get_login.php';
    }

    public function login(LoginRequest $request)
    {
        $errors = $request->validate();

        if(empty($errors)){

            $useremail = $request->getEmail();
            $password = $request->getPassword();

            $data = new AuthDTO($useremail,$password);

            $result = $this->authService->auth($data);

            if ($result === true){
                header("Location: /catalog");
                exit;
            }else{
                $errors['useremail'] = 'email or password incorrect';
            }
        }
        require_once "../Views/get_login.php";
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

    public function editProfile(EditProfileRequest $request)
    {
        $errors = $request->validate();

        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }

        if(empty($errors)){
            $newName = $request->getName();
            $newEmail = $request->getEmail();
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

    public function logout()
    {
        $this->authService->logout();
        header("Location: /login");
    }
}