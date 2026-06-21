<?php
//require_once"../Model/Model.php";
namespace Model;
class UserProducts extends Model
{
    private $id;
    private $productId;
    private $userId;
    private $amount;

    protected function getTableName()
    {
        return 'user_products';
    }

    public function getUserProducts(): array
    {
        $userId = $_SESSION['userId'];

        $stmt = $this->PDO->query(
            "SELECT * FROM {$this->getTableName()} 
                    WHERE user_id = {$userId}"
        );

        //get\

        $data = $stmt->fetchAll();

        $userProducts = [];

        foreach ($data as $userProduct){
            $obj = new self();
            $obj->id = $userProduct["id"];
            $obj->productId = $userProduct["product_id"];
            $obj->userId = $userProduct["user_id"];
            $obj->amount = $userProduct["amount"];

            $userProducts[]=$obj;

        }

        return $userProducts;


    }
//    public function getdataProducts()
//    {
//        $products = [];
//
//        $userProducts = $this->getUserProducts();
//
//        foreach ($userProducts as $userProduct){
//            $productsId = $userProduct['product_id'];
//            $stmt = $this->PDO->query("SELECT * FROM products WHERE id ={$productsId}");
//            $product = $stmt->fetch();
//
//            $product['amount'] = $userProduct['amount'];
//
//            $products[] = $product;
//
//        }
//        return $products;
//    }

    public function getdataProducts()
    {
        $products = [];

        $userProducts = $this->getUserProducts();

        foreach ($userProducts as $userProduct){
            $productsId = $userProduct->getProductId();

            $stmt = $this->PDO->query(
                "SELECT * FROM products 
                        WHERE id ={$productsId}"
            );
            $product = $stmt->fetch();

            $product['amount'] = $userProduct->getAmount();

            $products[] = $product;

        }

        //get
        return $products;
    }

    public function deleteByUserId(
        int $userId
    )
    {
        $stmt = $this-> PDO->prepare(
            "DELETE FROM {$this->getTableName()}
                    WHERE user_id = :userId"
        );
        $stmt->execute(['userId' =>$userId]);

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }


}