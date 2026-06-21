<?php

namespace Service;

use DTO\CartAddProductDTO;
use Model\UserProducts;

class CartService
{
    protected $userProductModel;

    public function __construct(){
        $this->userProductModel = new UserProducts();
    }


    public function addProduct(CartAddProductDTO $productDTO)
    {
        $data = $this->userProductModel->getUserProductByProductIdUserId($productDTO->getProductId(), $productDTO->getUser()->getId());

        if ($data === null) {
            $this->userProductModel->addUserProducts($productDTO->getProductId(), $productDTO->getUser()->getId(), $productDTO->getAmount());
        } else {
            $amount =  $productDTO->getAmount() + $data->getAmount();

            $this->userProductModel->updateAmountProducts($productDTO->getProductId(), $productDTO->getUser()->getId(), $amount);
        }

    }
}