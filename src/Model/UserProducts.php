<?php
//require_once"../Model/Model.php";
namespace Model;
class UserProducts extends Model
{
    public function getUserProducts(): array
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

    public function deleteByUserId(int $userId)
    {
        $stmt = $this-> PDO->prepare("DELETE FROM user_products WHERE user_id = :userId");
        $stmt->execute(['userId' =>$userId]);

    }


}