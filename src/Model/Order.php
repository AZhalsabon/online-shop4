<?php

namespace Model;

class Order extends Model
{
    public function addOrder(
        string $contactName,
        string $contactNumber,
        string $comment,
        string $address,$userId
    ){
        $stmt = $this->PDO->prepare(
            "INSERT INTO orders (contact_name,contact_number,comment,user_id,address) 
                    VALUES (:contact_name,:contact_number,:comment,:user_id,:address) RETURNING id"
        );
        $stmt->execute([
            'contact_name'=>$contactName,
            'contact_number'=>$contactNumber,
            'comment'=>$comment,'user_id'=>$userId,
            'address'=>$address
        ]);

        $data = $stmt->fetch();

        return $data['id'];
    }





}