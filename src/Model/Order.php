<?php

namespace Model;

class Order extends Model
{
    private int $id;
    private string $contactName;
    private string $contactNumber;
    private string $comment;
    private string $address;
    private int $userId;


    public function addOrder(
        string $contactName,
        string $contactNumber,
        string $comment,
        string $address,$userId
    ): self|null
    {
        $stmt = $this->PDO->prepare(
            "INSERT INTO orders (contact_name,contact_number,comment,user_id,address) 
                    VALUES (:contact_name,:contact_number,:comment,:user_id,:address) RETURNING id"
        );
        $stmt->execute([
            'contact_name'=>$contactName,
            'contact_number'=>$contactNumber,
            'comment'=>$comment,
            'user_id'=>$userId,
            'address'=>$address
        ]);

        // getId
        $data = $stmt->fetch();

        $obj = new self();

        if($data === false){
            return null;
        }else{
            $obj->id = $data['id'];

            return $obj;
        }


    }

    public function getAllByUserId($userId){
        $stmt = $this->PDO->prepare(
            "SELECT * FROM orders WHERE user_id = :userId"
        );
        $stmt->execute([
            "userId"=>$userId
        ]);

        //getOrder
        $data = $stmt->fetchAll();
        $orders = [];

        foreach ($data as $order){
            $obj = new self();
            $obj->id = $order['id'];
            $obj->contactName = $order['contact_name'];
            $obj->contactNumber = $order['contact_number'];
            $obj->comment = $order['comment'];
            $obj->address = $order['address'];
            $obj->userId = $order['user_id'];

            $orders[] = $obj;


        }
        return $orders;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getContactName(): string
    {
        return $this->contactName;
    }

    public function getContactNumber(): string
    {
        return $this->contactNumber;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }





}