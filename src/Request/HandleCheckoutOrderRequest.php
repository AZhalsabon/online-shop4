<?php

namespace Request;

class HandleCheckoutOrderRequest
{
    public function __construct(private array $data)
    {

    }

    public function getContactName(){
        return $this->data['contact_name'];
    }

    public function getContactNumber(){
        return $this->data['contact_number'];
    }

    public function getComment(){
        return $this->data['comment'];
    }

    public function getAddress(){

        $street = $this->data['street'];
        $apt = $this->data['apt'];
        $city = $this->data['city'];
        $region = $this->data['region'];

        if (empty(trim($apt))){
            $apartment = "";
        }else{
            $apartment = "кв $apt,";
        }

        $address = "ул. {$street},{$apartment} г. {$city}, {$region}";

        return $address;
    }
    public function validete()
    {
        $errors = [];


        return $errors;
    }

}