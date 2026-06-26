<?php

namespace Service\Auth;

use DTO\AuthDTO;
use Model\User;

class AuthSessionService implements AuthInterface
{
    protected $userModel;

    public function __construct(){
        $this->userModel = new User();
    }
    public function check():bool
    {
        $this->startSession();
        return !isset($_SESSION['userId']);

    }

    public function getCurrentUser()
    {
        $this->startSession();
        if(!$this->check()) {
            $userId =  $_SESSION['userId'];
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
                $this->startSession();
                $_SESSION['userId'] = $result->getId();

                return true;

            }else{
                return false;
            }
        }

    }

    private function startSession()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

    }

    public function logout()
    {
        $this->startSession();
        session_destroy();
    }
}