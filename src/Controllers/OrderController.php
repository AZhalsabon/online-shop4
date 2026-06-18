<?php

namespace Controllers;

use Model\Order;
use Model\Product;
use Model\UserProducts;
use Model\OrderProduct;



class OrderController
{
    private $orderModel;

    private $productModel;
    private $userProductsModel;
    private $orderProductModel;
    public function __construct()
    {
        $this->orderModel = new Order();
        $this->userProductsModel = new UserProducts();
        $this->orderProductModel = new OrderProduct();
        $this->productModel = new Product();

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
                $productId = $userProduct->getProductId();
                $amount = $userProduct->getAmount();
                $this->orderProductModel->create($orderId->getId(),$productId,$amount);
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

//    public function getAllOrders(){
//
//        if(session_status() !== PHP_SESSION_ACTIVE){
//            session_start();
//        }
//
//        if (!isset($_SESSION['userId'])) {
//            header("Location: /login");
//            exit;
//        }
//
//        $userId  = $_SESSION['userId'];
//
//        //получаю все заказы пользователя по userId
//        $userOrders = $this->orderModel->getAllByUserId($userId);
//
//        $allOrders = [];
//
//
//        foreach ($userOrders as $userOrder){
//
//            $newOrderProduct[] = $userOrder;
//
//
//            $orderId = $userOrder['id'];
//
//            $orderProducts = $this->orderProductModel->getAllByOrderId($orderId);
//
//            $products = [];
//
//            foreach ($orderProducts as $orderProduct){
//                $productId = $orderProduct['product_id'];
//
//                $dataProduct = $this->productModel->getProductsById($productId);
//
//                $orderProduct['product_name'] = $dataProduct['name'];
//                $orderProduct['description'] = $dataProduct['description'];
//                $orderProduct['price'] = $dataProduct['price'];
//                $orderProduct['image_url'] = $dataProduct['image_url'];
//                $orderProduct['total_price'] = $dataProduct["price"]* $orderProduct['amount'];
//
//                $products[] = $orderProduct;
//
//            }
//            $userOrder['order_products'] = $newOrderProduct;
//            $allOrders = $userOrder;
//
//
//        }
//        print_r($allOrders);
//
//        require_once "../Views/user_order_page.php";
//
//
//
//
//
//    }

    public function getAllOrders() {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        $userId  = $_SESSION['userId'];

        // получаю все заказы пользователя по userId
        $userOrders = $this->orderModel->getAllByUserId($userId);

        $allOrders = []; // массив всех заказов

        foreach ($userOrders as $userOrder) {
            $newOrderProduct = []; // товары в текущем заказе

            $orderId = $userOrder->getId();

            $orderProducts = $this->orderProductModel->getAllByOrderId($orderId);

            foreach ($orderProducts as $orderProduct) {
                $productId = $orderProduct->getProductId();


                $dataProduct = $this->productModel->getProductsById($productId); // исправлено имя метода

                $newOrderProduct[] = [
                    'product_name' => $dataProduct->getName(),
                    'description'  => $dataProduct->getDescription(),
                    'price'        => $dataProduct->getPrice(),
                    'image_url'    => $dataProduct->getImageUrl(),
                    'amount'       => $orderProduct->getAmount(),
                    'total_price'  => $dataProduct->getPrice() * $orderProduct->getAmount(),
                ];

//                $orderProduct['product_name'] = $dataProduct->getName();
//                $orderProduct['description'] = $dataProduct->getDescription();
//                $orderProduct['price'] = $dataProduct->getPrice();
//                $orderProduct['image_url'] = $dataProduct->getImageUrl();
//                $orderProduct['total_price'] = $dataProduct->getPrice() * $orderProduct->getAmount();
//
//
//                $newOrderProduct[] = $orderProduct;
            }
            $totalOrderPrice = 0;
            foreach ($newOrderProduct as $prod) {
                $totalOrderPrice += $prod['total_price'];
            }
            $allOrders[] = [
                'id' => $userOrder->getId(),
                'order_products' => $newOrderProduct,
                'total_price' => $totalOrderPrice,
            ];

//            $userOrder['order_products'] = $newOrderProduct;
//
//            $totalOrderPrice = 0;
//            foreach ($newOrderProduct as $prod) {
//                $totalOrderPrice += $prod['total_price'];
//            }
//            $userOrder['total_price'] = $totalOrderPrice;

        }

//        print_r($allOrders);

        require_once "../Views/user_order_page.php";
    }

}