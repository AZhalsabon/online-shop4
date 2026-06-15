<?php
namespace Controllers;

use Model\UserProducts;

class CartController
{
    private $cartModel;

    public function __construct(){
        $this->cartModel = new UserProducts();
    }
    public function getCart()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }



        $dataProducts = $this->cartModel ->getdataProducts();


        require_once '../Views/cart_page.php';

    }
}