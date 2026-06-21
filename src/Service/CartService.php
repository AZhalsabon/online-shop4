<?php

namespace Service;

use Model\UserProducts;

class CartService
{
    protected $userProductModel;

    public function __construct(){
        $this->userProductModel = new UserProducts();
    }


    public function addProduct($productId, $userId, $amount)
    {
        $data = $this->userProductModel->getUserProductByProductIdUserId($productId, $userId);

        if ($data === null) {
            $this->userProductModel->addUserProducts($productId, $userId, $amount);
        } else {
            $amount = $amount + $data->getAmount();

            $this->userProductModel->updateAmountProducts($productId, $userId, $amount);
        }

    }
}