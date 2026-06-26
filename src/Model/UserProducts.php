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

    public function getUserProductsByUserId(): array
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

    public function getUserProductByProductIdUserId(
        $productId,
        $userId
    ): self|null
    {
        $stmt = $this->PDO->prepare(
            "SELECT * FROM  {$this->getTableName()} 
                    WHERE product_id = :productId AND user_id = :userId
                    ");
        $stmt->execute(['productId'=>$productId, 'userId'=>$userId]);

        //getuserProduct
        $data = $stmt->fetch();

        if($data === false){
            return null;

        }else{
            $obj = new self();
            $obj->id = $data['id'];
            $obj->productId = $data['product_id'];
            $obj->userId = $data['user_id'];
            $obj->amount = $data['amount'];
            return $obj;
        }

    }

    public function addUserProducts(
        $productId,
        $userId,
        $amount
    )
    {
        if ($amount > 0){
            $stmt = $this->PDO->prepare(
                "INSERT INTO  {$this->getTableName()} (user_id, product_id, amount)
                        VALUES (:userId,:productId,:amount)");
            $stmt->execute(['userId'=>$userId,'productId'=>$productId,'amount'=>$amount]);
        }
    }

    public function updateAmountProducts(
        $productId,
        $userId,
        $amount)
    {
        if($amount <= 0){
            $this->removeUserProduct($productId, $userId);
        }
        $stmt = $this->PDO->prepare(
            "UPDATE  {$this->getTableName()} SET amount = :amount 
                     WHERE user_id = :userId and product_id = :productId"
        );

        $stmt->execute(['amount'=>$amount,'userId'=>$userId,'productId'=>$productId]);

    }

    public function removeUserProduct($productId, $userId)
    {
        $stmt = $this->PDO->prepare(
            "DELETE FROM  {$this->getTableName()} 
                    WHERE user_id = :userId AND product_id = :productId"
        );

        return $stmt->execute(['userId' => $userId, 'productId' => $productId]);
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