<?php

namespace Request;

class AddReviewProductRequest
{
    public function __construct(private array $data)
    {

    }

    public function getUserId()
    {
        return $this->data['user_id'];
    }
    public function getProductId(){
        return $this->data['product_id'];
    }
    public function getReview(){
        return $this->data['review'];
    }

    public function getRating()
    {
        return $this->data['rating'];
    }

}