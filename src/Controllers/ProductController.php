<?php

class ProductController
{
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

//        require_once '../Model/Product.php';

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

//            require_once '../Model/Product.php';
            $productModel = new Product();
            $data = $productModel->getUserProductByProductIdUserId($productId,$userId);

            if($data === false){
//                require_once '../Model/Product.php';
                $productModel = new Product();
                $productModel->addUserProducts($productId, $userId, $amount);
            }else{
                $amount = $amount + $data['amount'];

//                require_once '../Model/Product.php';
                $productModel = new Product();
                $productModel->updateAmountProducts($productId, $userId, $amount);


            }

            header("Location: /cart");

        }

    }


    private function validateAddProduct(array $data): array
    {
        $errors = [];

        if (isset($data['product_id'])){
            $productId = (int) $data['product_id'];

//            require_once '../Model/Product.php';
            $productModel = new Product();
            $data = $productModel->gerProductsById($productId);

            if($data === false){
                $errors['product_id'] = 'Продукт не найден';
            }

        }else{
            $errors['product_id'] = "id продукта должен быть указан";
        }

        if(isset($data['amount'])){
            $amount = (int) $data['amount'];
        }


        return $errors;
    }

}