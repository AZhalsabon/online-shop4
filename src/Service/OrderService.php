<?php

namespace Service;

use Model\Order;
use Model\OrderProduct;
use Model\UserProducts;

class OrderService
{
    private $orderModel;
    private $orderProductModel;

    private $userProductsModel;

    public function __construct(){
        $this->userProductsModel = new UserProducts();
        $this->orderProductModel = new OrderProduct();
        $this->orderModel = new Order();
    }
    public function handleCheckoutOrder($contactName,$contactNumber,$comment,$address,$userId)
    {
        $orderId = $this->orderModel->addOrder($contactName,$contactNumber,$comment,$address,$userId);


        $userProducts = $this->userProductsModel->getUserProducts();

        foreach ($userProducts as $userProduct){
            $productId = $userProduct->getProductId();
            $amount = $userProduct->getAmount();
            $this->orderProductModel->create($orderId->getId(),$productId,$amount);
        }

        $this->userProductsModel->deleteByUserId($userId);
    }
}