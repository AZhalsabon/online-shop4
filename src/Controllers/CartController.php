<?php
namespace Controllers;

use Model\Product;
use Model\UserProducts;
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


    public function decreaseProduct()
    {
        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }
        $userId = $_SESSION['userId'];
        $productId = $_POST['product_id'];
        $amount = $_POST['amount'];





//        $data = $this->productModel->getUserProductByProductIdUserId($productId,$userId);
//
//        if($data === null){
//            $this->productModel->addUserProducts($productId, $userId, $amount);
//        }else{
//            $amount = $amount + $data->getAmount();
//
//            $this->productModel->updateAmountProducts($productId, $userId, $amount);
//
//
//        }

        header("Location: /cart");

    }


    public function addProduct()
    {
        $errors = $this->validateAddProduct($_POST);

        if(empty($errors) ){
            if ($this->authService->check()) {
                header("Location: /login");
                exit;
            }


            $user = $this->authService->getCurrentUser();
            $userId = $user->getId();
            $productId = $_POST['product_id'];
            $amount = $_POST['amount'];

            $this->cartService->addProduct($productId, $userId, $amount);

            header("Location: /cart");

        }

    }


    private function validateAddProduct(array $data): array
    {
        $errors = [];

        if (isset($data['product_id'])){
            $productId = (int) $data['product_id'];

            $products = $this->productModel->getProductsById($productId);

            if($products === false){
                $errors['product_id'] = 'Продукт не найден';
            }

        }else{
            $errors['product_id'] = "id продукта должен быть указан";
        }

//        if(isset($data['amount'])){
//            $amount = (int) $data['amount'];
//        }


        return $errors;
    }
}