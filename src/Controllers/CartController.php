<?php
namespace Controllers;

use DTO\CartAddProductDTO;
use Model\Product;
use Model\UserProducts;
use Request\AddProductRequest;
use Service\CartService;

class CartController extends BaseController
{
    private $userProductModel;
    private $cartService;

    private $productModel;

    public function __construct(){
        parent::__construct();

        $this->cartService = new CartService();
        $this->userProductModel = new UserProducts();
        $this->productModel = new Product();
    }
    public function getCart()
    {

        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }



        $dataProducts = $this->productModel->getdataProducts();


        require_once '../Views/cart_page.php';

    }

    public function getAddProduct()
    {
        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }

        require_once '../Views/add_product_form.php';
    }


//    public function decreaseProduct()
//    {
//        if ($this->authService->check()) {
//            header("Location: /login");
//            exit;
//        }
//        $userId = $_SESSION['userId'];
//        $productId = $_POST['product_id'];
//        $amount = $_POST['amount'];
//
//
//        header("Location: /cart");
//
//    }


    public function addProduct(AddProductRequest $request)
    {
        $errors = $request->validate();

        if(empty($errors) ){
            if ($this->authService->check()) {
                header("Location: /login");
                exit;
            }


            $user = $this->authService->getCurrentUser();
            $userId = $user->getId();
            $productId = $request->getProductId();
            $amount = $request->getAmount();

            $data = new CartAddProductDTO($productId, $amount);

            $this->cartService->addProduct($data);

            header("Location: /cart");

        }

    }
}