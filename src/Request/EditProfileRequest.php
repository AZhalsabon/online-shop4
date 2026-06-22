<?php

namespace Request;

use Model\User;

class EditProfileRequest
{
    public function __construct(private array $data)
    {


    }
    public function getName(){
        return $this->data['name'];
    }

    public function getEmail(){
        return $this->data['email'];
    }

    public function validate(): array
    {
        $errors = [];

        if(isset($this->data['name'])){
            $name = $this->data['name'];
            if(strlen($name) < 3){
                $errors['name'] = "Имя короткое";
            }
        }

        if(isset($this->data['email'])){
            $name = $this->data['email'];
            if(strlen($name) < 3){
                $errors['email' ] = "email короткий";
            }elseif(!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "некорректный email";
            }
        }else{
            $userId = $_SESSION['userId'];

            require_once '../Model/User.php';

            $userModel = new User();

            $user =  $userModel->getByEmail($data['email']);

            if ($user->getId() !== $userId){
                $errors = "Этот Email уже занят";
            }
        }
        return $errors;
    }

}