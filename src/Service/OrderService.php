<?php

namespace Service;

use DTO\OrderCreateDTO;
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
    public function create(OrderCreateDTO $data)
    {
        $orderId = $this->orderModel->addOrder(
            $data->getName(),
            $data->getPhon(),
            $data->getComment(),
            $data->getAddress(),
            $data->getUser()->getId());


        $userProducts = $this->userProductsModel->getUserProducts();

        foreach ($userProducts as $userProduct){
            $productId = $userProduct->getProductId();
            $amount = $userProduct->getAmount();
            $this->orderProductModel->create($orderId->getId(),$productId,$amount);
        }

        $this->userProductsModel->deleteByUserId($data->getUser()->getId());
    }
}