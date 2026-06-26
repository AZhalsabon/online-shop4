<?php

namespace Service\Auth;

use DTO\AuthDTO;
use Model\User;

class AuthCookieService implements AuthInterface
{
    protected $userModel;

    public function __construct(){
        $this->userModel = new User();
    }
    public function check():bool
    {
        return !isset($_COOKIE['userId']);

    }

    public function getCurrentUser()
    {
        if(!$this->check()) {
            $userId =  $_COOKIE['userId'];
            return $this->userModel->getBySessionId($userId);

        }else{
            return null;
        }
    }

    public function auth(AuthDTO $data):bool
    {
        $result = $this->userModel->getByEmail($data->getUserEmail());

        if ($result === null){
            return false;
        }else{
            $passwordDb = $result->getPassword();

            if (password_verify($data->getUserPassword(), $passwordDb)){
                setcookie('iserId',$result->getId());
                return true;

            }else{
                return false;
            }
        }

    }

    public function logout()
    {
        setCookie('userId','',time() - 3600,'/');
        unset($_COOKIE['userId']);
    }

}