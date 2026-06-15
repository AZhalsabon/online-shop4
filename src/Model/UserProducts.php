<?php
//require_once"../Model/Model.php";

class UserProducts extends Model
{
    public function getUserProducts()
    {
        $userId = $_SESSION['userId'];

        $stmt = $this->PDO->query("SELECT * FROM user_products WHERE user_id = {$userId}");

        return $stmt->fetchAll();
    }

    public function getdataProducts()
    {
        $products = [];

        $userProducts = $this->getUserProducts();

        foreach ($userProducts as $userProduct){
            $productsId = $userProduct['product_id'];
            $stmt = $this->PDO->query("SELECT * FROM products WHERE id ={$productsId}");
            $product = $stmt->fetch();

            $product['amount'] = $userProduct['amount'];

            $products[] = $product;

        }
        return $products;
    }
}