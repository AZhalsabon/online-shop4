<?php

namespace Controllers;

use Model\Order;
use Model\UserProducts;
use Model\OrderProduct;


class OrderController
{
    private $orderModel;
    private $userProductsModel;
    private $orderProductModel;
    public function __construct()
    {
        $this->orderModel = new Order();
        $this->userProductsModel = new UserProducts();
        $this->orderProductModel = new OrderProduct();

    }
    public function getCheckoutOrderForm()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }



//        $dataProducts = $this->cartModel ->getdataProducts();


        require_once '../Views/order_page.php';
    }

    public function handleCheckoutOrder()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        $errors = $this->validete($_POST);

        if(empty($errors)){
            $userId = $_SESSION['userId'];

            $contactName = $_POST['contact_name'];
            $contactNumber = $_POST['contact_number'];

            $street = $_POST['street'];
            $apt = $_POST['apt'];
            $city = $_POST['city'];
            $region = $_POST['region'];
            $comment = $_POST['comment'];

            if (empty(trim($apt))){
                $apartment = "";
            }else{
                $apartment = "кв $apt,";
            }

            $address = "ул. {$street},{$apartment} г. {$city}, {$region}";

            $orderId = $this->orderModel->addOrder($contactName,$contactNumber,$comment,$address,$userId);

            $userProducts = $this->userProductsModel->getUserProducts();

            foreach ($userProducts as $userProduct){
                $productId = $userProduct['product_id'];
                $amount = $userProduct['amount'];
                $this->orderProductModel->create($orderId,$productId,$amount);
            }

            $this->userProductsModel->deleteByUserId($userId);


        }else{
            require_once "../Views/order_page.php";
        }

    }

    private function validete(array $data)
    {
        $errors = [];


        return $errors;
    }

}