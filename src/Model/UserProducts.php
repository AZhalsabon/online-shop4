<?php

class UserProducts
{
    public function getUserProducts()
    {
        $userId = $_SESSION['userId'];
        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

        $stmt = $pdo->query("SELECT * FROM user_products WHERE user_id = {$userId}");


        return $stmt->fetchAll();


    }
    public function getdataProducts()
    {
        $products = [];

        $userProducts = $this->getUserProducts();
        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
        foreach ($userProducts as $userProduct){
            $productsId = $userProduct['product_id'];
            $stmt = $pdo->query("SELECT * FROM products WHERE id ={$productsId}");
            $product = $stmt->fetch();

            $product['amount'] = $userProduct['amount'];

            $products[] = $product;

        }
        return $products;

    }

}