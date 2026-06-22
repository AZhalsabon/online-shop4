<?php

namespace DTO;

class AuthDTO
{
    public function __construct(private $userEmail, private $userPassword)
    {

    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->userPassword;
    }


}