<?php
namespace Controllers;

use Model\Product;

class ProductController
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new Product();

    }

    public function getCatalog()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        require_once '../Views/catalog_page.php';


    }

    public function getDataCatalog()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }


        $productModel = new Product();
        $products = $productModel->getProducts();

        require_once '../Views/catalog_page.php';

    }

    public function getAddProduct()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        require_once '../Views/add_product_form.php';
    }


    public function addProduct()
    {
        $errors = $this->validateAddProduct($_POST);

        if(empty($errors) ){

            if(session_status() !== PHP_SESSION_ACTIVE){
                session_start();
            }

            if (!isset($_SESSION['userId'])) {
                header("Location: /login");
                exit;
            }


            $userId = $_SESSION['userId'];
            $productId = $_POST['product_id'];
            $amount = $_POST['amount'];

            $data = $this->productModel->getUserProductByProductIdUserId($productId,$userId);

            if($data === null){
                $this->productModel->addUserProducts($productId, $userId, $amount);
            }else{
                $amount = $amount + $data->getAmount();

                $this->productModel->updateAmountProducts($productId, $userId, $amount);


            }

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