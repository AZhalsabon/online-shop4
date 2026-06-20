<?php
namespace Controllers;

use Model\UserProducts;

class CartController extends BaseController
{
    private $cartModel;

    public function __construct(){
        parent::__construct();
        $this->cartModel = new UserProducts();
    }
    public function getCart()
    {

        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }



        $dataProducts = $this->cartModel->getdataProducts();


        require_once '../Views/cart_page.php';

    }
}