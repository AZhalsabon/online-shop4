<?php

namespace Request;

class LoginRequest
{
    public function __construct(private array $data)
    {

    }

    public function getEmail(){
        return $this->data['useremail'];
    }

    public function getPassword(){
        return $this->data['password'];
    }

    public function validate(): array
    {
        $errors = [];

        if(empty($this->data['useremail'])){
            $errors['useremail'] = 'Поле email должно быть заполнено';
        }
        if(empty($this->data['password'])){
            $errors['password'] = 'Поле password должно быть заполнено';
        }
        return $errors;
    }



}