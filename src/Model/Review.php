<?php

namespace Model;

class Review extends Model
{
    private $id;
    private $productId;
    private $userId;
    private $review;

    private $grade;

    private $created_at;

    protected function getTableName()
    {
        return 'reviews';
    }

    public function addReview(int $productId, int $userId,string $review, float $grade){
        $stmt = $this->PDO->prepare(
            "INSERT INTO {$this->getTableName()} (product_id,user_id,review,grade)  
                    VALUES(:productId, :userId, :review, :grade)");
        $stmt->execute(['productId' => $productId, 'userId' => $userId, 'review' => $review, 'grade' => $grade]);
    }

    public function getReviews($productid)
    {
        $stmt = $this->PDO->prepare("SELECT * FROM {$this->getTableName()} WHERE product_id = :productId");
        $stmt->execute(['productId' => $productid]);
        $data = $stmt->fetchAll();

        $reviews = [];

        foreach ($data as $review){
            $obj = new self();
            $obj->id = $review["id"];
            $obj->productId = $review["product_id"];
            $obj->userId = $review["user_id"];
            $obj->review = $review["review"];
            $obj->grade = $review["grade"];
            $obj->created_at = $review["created_at"];

            $reviews[] = $obj;
        }
        return $reviews;

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
    public function getReview()
    {
        return $this->review;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }


}