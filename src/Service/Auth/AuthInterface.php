<?php

namespace Service\Auth;

use DTO\AuthDTO;
use Model\User;

interface AuthInterface
{

    public function check():bool;

    public function getCurrentUser();

    public function auth(AuthDTO $data):bool;

    public function logout();

}