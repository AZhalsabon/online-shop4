<?php

namespace DTO;

use Model\User;

class CartAddProductDTO
{
    public function __construct(private $productId,private User $user,private $amount)
    {

    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

}