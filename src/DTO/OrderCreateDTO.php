<?php

namespace DTO;

use Model\User;

class OrderCreateDTO
{
    public function __construct(private $name,private $phon, private $comment,private $address, private User $user){
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPhon()
    {
        return $this->phon;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    public function getUser(): User
    {
        return $this->user;
    }


}