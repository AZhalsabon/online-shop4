<?php

class CartController
{
    public function getCart()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        require_once '../Model/UserProducts.php';

        $productModel = new UserProducts();
//        $products = $productModel->getUserProducts();

        $dataProducts = $productModel->getdataProducts();

//        print_r($dataProducts);

        require_once '../Views/cart_page.php';

    }

}