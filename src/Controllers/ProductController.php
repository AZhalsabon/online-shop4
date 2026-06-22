<?php
namespace Controllers;

use Model\Product;
use Model\User;

use Model\Review;
use Model\UserProducts;
use Request\AddReviewProductRequest;
use Request\GetOneProductIdRequest;


class ProductController extends BaseController
{
    private $productModel;
    private $cartModel;
    private $userModel;

    private $reviewModel;

    public function __construct()
    {
        parent::__construct();
        $this->productModel = new Product();
        $this->cartModel = new UserProducts();
        $this->reviewModel = new Review();
        $this->userModel = new User();




    }

    public function getOneProduct(GetOneProductIdRequest $request)
    {
        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }

        $user = $this->authService->getCurrentUser();


        $productId = $request->getProductId();

        $product = $this->productModel->getProductsById($productId);

        $reviews = $this->reviewModel->getReviews($productId);




        require_once '../Views/product_page.php';


    }

    public function addReviewsProduct(AddReviewProductRequest $request)
    {
        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }

        $userId = $request->getUserId();
        $grade = $request->getRating();
        $review = $request->getReview();
        $productId = $request->getProductId();

        $productReview = $this->reviewModel->addReview($productId, $userId, $review,$grade);


        echo 'работает';



    }

    public function getCatalog()
    {
        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }



        require_once '../Views/catalog_page.php';


    }

    public function getDataCatalog()
    {
        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }


        $products = $this->productModel->getProducts();


        require_once '../Views/catalog_page.php';

    }



}