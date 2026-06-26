<?php

namespace Service;

use DTO\OrderCreateDTO;
use Model\Order;
use Model\OrderProduct;
use Model\UserProducts;
use Service\Auth\AuthInterface;
use Service\Auth\AuthSessionService;



class OrderService
{
    private $orderModel;
    private $orderProductModel;

    private $userProductsModel;

    private AuthInterface $authService;

    public function __construct(){
        $this->authService = new AuthSessionService();
        $this->userProductsModel = new UserProducts();
        $this->orderProductModel = new OrderProduct();
        $this->orderModel = new Order();
    }
    public function create(OrderCreateDTO $data)
    {
        $user = $this->authService->getCurrentUser();
        $orderId = $this->orderModel->addOrder(
            $data->getName(),
            $data->getPhon(),
            $data->getComment(),
            $data->getAddress(),
            $user->getId()
        );


        $userProducts = $this->userProductsModel->getUserProductsByUserId();

        foreach ($userProducts as $userProduct){
            $productId = $userProduct->getProductId();
            $amount = $userProduct->getAmount();
            $this->orderProductModel->create($orderId->getId(),$productId,$amount);
        }

        $this->userProductsModel->deleteByUserId($user->getId());
    }
}