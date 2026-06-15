<?php
//require_once"../Model/Model.php";
namespace Model;
class Product extends Model
{

    public function getProducts()
    {
        $stmt = $this->PDO->query("SELECT * FROM products");
        $products = $stmt->fetchAll();
        return $products;
    }

    public function gerProductsById($productId)
    {
        $stmt = $this->PDO->prepare("SELECT * FROM products WHERE id = :productId ");
        $stmt->execute(['productId'=>$productId]);
        $data = $stmt->fetch();
        return $data;
    }

    public function getUserProductByProductIdUserId($productId, $userId)
    {
        $stmt = $this->PDO->prepare("SELECT * FROM user_products WHERE product_id = :productId AND user_id = :userId");
        $stmt->execute(['productId'=>$productId, 'userId'=>$userId]);
        $data = $stmt->fetch();

        return $data;
    }

    public function addUserProducts($productId, $userId,$amount)
    {
        $stmt = $this->PDO->prepare("INSERT INTO user_products (user_id, product_id, amount) VALUES (:userId,:productId,:amount)");
        $stmt->execute(['userId'=>$userId,'productId'=>$productId,'amount'=>$amount]);
    }

    public function updateAmountProducts($productId, $userId, $amount)
    {
        $stmt = $this->PDO->prepare("UPDATE user_products SET amount = :amount WHERE user_id = :userId and product_id = :productId");
        $stmt->execute(['amount'=>$amount,'userId'=>$userId,'productId'=>$productId]);

    }
}