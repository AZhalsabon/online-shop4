<?php

namespace Controllers;

use DTO\OrderCreateDTO;
use Model\Order;
use Model\Product;
use Model\UserProducts;
use Model\OrderProduct;
use Request\HandleCheckoutOrderRequest;
use Service\OrderService;


class OrderController extends BaseController
{
    private $orderService;
    private $orderModel;
    private $productModel;
    private $userProductsModel;
    private $orderProductModel;
    public function __construct()
    {
        parent::__construct();
        $this->orderService = new OrderService();

        $this->orderModel = new Order();
        $this->userProductsModel = new UserProducts();
        $this->orderProductModel = new OrderProduct();
        $this->productModel = new Product();

    }
    public function getCheckoutOrderForm()
    {


        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }

        require_once '../Views/order_page.php';
    }

    public function handleCheckoutOrder(HandleCheckoutOrderRequest $request)
    {


        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }

        $errors = $request->validete();

        if(empty($errors)){
            $contactName = $request->getContactName();
            $contactNumber = $request->getContactNumber();
            $comment = $request->getComment();
            $address = $request->getAddress();

            $dto = new OrderCreateDTO($contactName,$contactNumber,$comment,$address);

            $this->orderService->create($dto);

            header("Location: /orders");

        }else{
            require_once "../Views/order_page.php";
        }

    }

    private function validete(array $data)
    {
        $errors = [];


        return $errors;
    }

    public function getAllOrders() {

        if ($this->authService->check()) {
            header("Location: /login");
            exit;
        }

        $user = $this->authService->getCurrentUser();

        // получаю все заказы пользователя по userId
        $userOrders = $this->orderModel->getAllByUserId($user->getId());

        $allOrders = []; // массив всех заказов

        foreach ($userOrders as $userOrder) {
            $newOrderProduct = []; // товары в текущем заказе

            $orderId = $userOrder->getId();

            $orderProducts = $this->orderProductModel->getAllByOrderId($orderId);

            foreach ($orderProducts as $orderProduct) {
                $productId = $orderProduct->getProductId();


                $dataProduct = $this->productModel->getProductsById($productId); // исправлено имя метода

                $newOrderProduct[] = [
                    'product_name' => $dataProduct->getName(),
                    'description'  => $dataProduct->getDescription(),
                    'price'        => $dataProduct->getPrice(),
                    'image_url'    => $dataProduct->getImageUrl(),
                    'amount'       => $orderProduct->getAmount(),
                    'total_price'  => $dataProduct->getPrice() * $orderProduct->getAmount(),
                ];

            }
            $totalOrderPrice = 0;
            foreach ($newOrderProduct as $prod) {
                $totalOrderPrice += $prod['total_price'];
            }
            $allOrders[] = [
                'id' => $userOrder->getId(),
                'order_products' => $newOrderProduct,
                'total_price' => $totalOrderPrice,
            ];

        }

        require_once "../Views/user_order_page.php";
    }

}