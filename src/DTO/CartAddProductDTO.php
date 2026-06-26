<?php

namespace DTO;

use Model\User;

class CartAddProductDTO
{
    public function __construct(private $productId,private $amount)
    {

    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }



    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

}