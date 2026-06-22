<?php

namespace Request;

class RegistrateRequest
{
    public function __construct(private array $data)
    {

    }

    public function getName()
    {
        return $this->data['name'];

    }

    public function getEmail()
    {
        return $this->data['email'];
    }

    public function getPassword()
    {
        return $this->data['password'];
    }

    public function validate(){
        $errors = [];

        if(isset($this->data['name'])){
            $name = $this->data['name'];

            if(strlen($name) < 2){
                $errors['name'] = 'имя должно быть больше 2 символов';
            }
        }else{
            $errors['name'] = 'имя должно быть заполнено';
        }

        if(isset($this->data['email'])){
            $email = $this->data['email'];

            if(strlen($email) < 2){
                $errors['email'] = 'имя должно быть больше 2 символов';
            } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $errors['email'] = 'данные неверные';
            }
        }else{
            $errors['email'] = 'email должнен быть заполнен';
        }

        if(isset($this->data['password'])){
            $password = $this->data['password'];

            if (strlen($password) < 6 ){
                $errors['password'] = 'праоль должен быть больше 6 символов';
            } elseif ($confirm = $this->data['confirm'] and $password !== $confirm){
                $errors['confirm'] = 'пароли не совподают';
            }
        }
        return $errors;
    }

}