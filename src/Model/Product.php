<?php
//require_once"../Model/Model.php";
namespace Model;
class Product extends Model
{
    private $id;
    private $productId;
    private $userId;
    private $amount;

    private $name;
    private $description;
    private $imageUrl;
    private $price;

    public function getProducts()
    {
        $stmt = $this->PDO->query("SELECT * FROM products");
        //get
        $data = $stmt->fetchAll();

        $products = [];

        foreach ($data as $product){
            $obj = new self();
            $obj->id = $product["id"];
            $obj->name = $product["name"];
            $obj->description = $product["description"];
            $obj->imageUrl = $product["image_url"];
            $obj->price = $product["price"];

            $products[] = $obj;
        }


        return $products;
    }

    public function getProductsById($productId)
    {
        $stmt = $this->PDO->prepare("SELECT * FROM products WHERE id = :productId ");
        $stmt->execute(['productId'=>$productId]);

        //getProduct
        $data = $stmt->fetch();
        if($data === false){
            return null;
        }else{
            $obj = new self();
            $obj->id = $data['id'];
            $obj->name = $data['name'];
            $obj->description = $data['description'];
            $obj->price = $data['price'];
            $obj->imageUrl = $data['image_url'];

            return $obj;

        }
    }

    public function getUserProductByProductIdUserId($productId, $userId): self|null
    {
        $stmt = $this->PDO->prepare("SELECT * FROM user_products WHERE product_id = :productId AND user_id = :userId");
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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }




}