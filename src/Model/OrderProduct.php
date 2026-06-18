<?php

namespace Model;

class OrderProduct extends Model
{
    private $id;
    private $orderId;
    private $productId;
    private $amount;

    public function create(int $orderId,int $productId, int $amount)
    {
        $stmt = $this->PDO->prepare("
        INSERT INTO order_products (order_id,product_id,amount) 
        VALUES (:orderId,:productId,:amount)"
        );
        $stmt->execute(['orderId'=>$orderId,'productId'=>$productId,'amount'=>$amount]);
    }

    public function getAllByOrderId(int $orderId){
        $stmt = $this->PDO->prepare("SELECT * FROM order_products WHERE order_id = :orderId");
        $stmt->execute(['orderId'=>$orderId]);

        //getOrderProduct
        $data = $stmt->fetchAll();

        $orderProducts = [];

        foreach ($data as $orderProduct){
            $obj = new self();
            $obj->id = $orderProduct['id'];
            $obj->orderId = $orderProduct['order_id'];
            $obj->productId = $orderProduct['product_id'];
            $obj->amount = $orderProduct['amount'];

            $orderProducts[] = $obj;

        }

        return $orderProducts;
    }

    /**
     * @return mixed
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @return mixed
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @return mixed
     */
    public function getAmount(): int
    {
        return $this->amount;
    }


}