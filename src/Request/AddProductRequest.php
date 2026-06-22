<?php

namespace Request;

use Model\Product;

class AddProductRequest
{
    public function __construct(private array $data)
    {

    }

    public function getProductId()
    {
        return $this->data['product_id'];

    }

    public function getAmount()
    {
        return $this->data['amount'];
    }

    public function validate(): array
    {
        $errors = [];

        if (isset($this->data['product_id'])){
            $productId = (int) $this->data['product_id'];

            $productModel = new Product();

            $products = $productModel->getProductsById($productId);

            if($products === false){
                $errors['product_id'] = 'Продукт не найден';
            }

        }else{
            $errors['product_id'] = "id продукта должен быть указан";
        }
        return $errors;
    }



}