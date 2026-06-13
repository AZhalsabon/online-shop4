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

        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

        $stmt = $pdo->query("SELECT * FROM products");
        $products = $stmt->fetchAll();

//print_r($products);

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

            $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

            $userId = $_SESSION['userId'];
            $productId = $_POST['product_id'];
            $amount = $_POST['amount'];

            $stmt = $pdo->prepare("SELECT * FROM user_products WHERE product_id = :productId AND user_id = :userId");
            $stmt->execute(['productId'=>$productId, 'userId'=>$userId]);
            $data = $stmt->fetch();

            if($data === false){
                $stmt = $pdo->prepare("INSERT INTO user_products (user_id, product_id, amount) VALUES (:userId,:productId,:amount)");
                $stmt->execute(['userId'=>$userId,'productId'=>$productId,'amount'=>$amount]);

            }else{
                $amount = $amount + $data['amount'];
                $stmt = $pdo->prepare("UPDATE user_products SET amount = :amount WHERE user_id = :userId and product_id = :productId");
                $stmt->execute(['amount'=>$amount,'userId'=>$userId,'productId'=>$productId]);

            }
        }

    }


    private function validateAddProduct(array $data): array
    {
        $errors = [];

        if (isset($data['product_id'])){
            $productId = (int) $data['product_id'];

            $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
            $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :productId ");
            $stmt->execute(['productId'=>$productId]);
            $data = $stmt->fetch();

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