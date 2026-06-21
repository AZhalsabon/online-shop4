<?php
//require_once"../Model/Model.php";
namespace Model;
class Product extends Model
{
    private $id;
    private $name;
    private $description;
    private $imageUrl;
    private $price;

    protected function getTableName()
    {
        return 'products';
    }
    public function getProducts()
    {
        $stmt = $this->PDO->query(
            "SELECT * FROM {$this->getTableName()}
            ");
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

    public function getProductsById(
        $productId
    )
    {
        $stmt = $this->PDO->prepare(
            "SELECT * FROM {$this->getTableName()} 
                    WHERE id = :productId 
                    ");
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

    public function getdataProducts()
    {
        $products = [];

        $userProduct = new UserProducts();

        $userProducts = $userProduct->getUserProducts();

        foreach ($userProducts as $userProduct){
            $productsId = $userProduct->getProductId();

            $stmt = $this->PDO->query(
                "SELECT * FROM {$this->getTableName()} 
                        WHERE id ={$productsId}"
            );
            $product = $stmt->fetch();

            $product['amount'] = $userProduct->getAmount();

            $products[] = $product;

        }

        //get
        return $products;
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