<?php

namespace Service;

use DTO\CartAddProductDTO;
use Model\UserProducts;
use Service\Auth\AuthInterface;
use Service\Auth\AuthSessionService;



class CartService
{
    private AuthInterface $authService;
    private $userProductModel;

    public function __construct(){
        $this->userProductModel = new UserProducts();
        $this->authService = new AuthSessionService();
    }


    public function addProduct(CartAddProductDTO $productDTO)
    {
        $user = $this->authService->getCurrentUser();

        $data = $this->userProductModel->getUserProductByProductIdUserId($productDTO->getProductId(),$user->getId());

        if ($data === null) {
            $this->userProductModel->addUserProducts($productDTO->getProductId(), $user->getId(), $productDTO->getAmount());
        } else {
            $amount =  $productDTO->getAmount() + $data->getAmount();

            $this->userProductModel->updateAmountProducts($productDTO->getProductId(), $user->getId(), $amount);
        }

    }
}