<?php

use Controllers\CartController;
use Controllers\OrderController;
use Controllers\ProductController;
use Controllers\UserController;

$autoload = function (string $className){
    $path = str_replace("\\" ,'/',$className );
    $path = $path . '.php';
    $path = './../' . $path;

    if(file_exists($path)){
        require_once $path;
        return true;
    }

    return false;
};

spl_autoload_register($autoload);

$app = new Core\App();

$app->get('/registration',UserController::class,'getRegistrate');
$app->post('/registration',UserController::class,'registrate');
$app->get('/login',UserController::class,'getLogin');
$app->post('/login',UserController::class,'login');
$app->get('/catalog',ProductController::class,'getDataCatalog');

$app->get('/profile',UserController::class,'getDataProfile');
$app->get('/edit-profile',UserController::class,'getEditProfile');
$app->post('/edit-profile',UserController::class,'editProfile');
$app->get('/add-product',CartController::class,'getAddProduct');
$app->post('/add-product',CartController::class,'addProduct');

$app->post('/decrease-product',CartController::class,'decreaseProduct');

$app->get('/cart',CartController::class,'getCart');
$app->get('/create-order',OrderController::class,'getCheckoutOrderForm');
$app->post('/create-order',OrderController::class,'handleCheckoutOrder');
$app->addRoutes('/orders','GET',OrderController::class,'getAllOrders');

$app->get('/product',ProductController::class,'getOneProduct');
$app->post('/product',ProductController::class,'addReviewsProduct');


$app->run();



//[
//    '/registration' =>[
//        'GET'=>[
//            'class'=>UserController::class,
//            'method'=>'getRegistrate',
//        ],
//        'POST'=>[
//            'class'=>UserController::class,
//            'method'=>'registrate',
//        ],
//
//    ],
//    '/login' =>[
//        'GET'=>[
//            'class'=>UserController::class,
//            'method'=>'getLogin',
//        ],
//        'POST'=>[
//            'class'=>UserController::class,
//            'method'=>'login',
//        ],
//
//    ],
//    '/catalog' =>[
//        'GET'=>[
//            'class'=>ProductController::class,
//            'method'=>'getDataCatalog',
//        ]
//    ],
//    '/profile' => [
//        'GET'=>[
//            'class'=>UserController::class,
//            'method'=>'getDataProfile',
//        ]
//    ],
//    '/edit-profile'=>[
//        'GET'=>[
//            'class'=>UserController::class,
//            'method'=>'getEditProfile'
//        ],
//        'POST'=>[
//            'class'=>UserController::class,
//            'method'=>'editProfile',
//        ]
//
//    ],
//    '/add-product'=>[
//        'GET'=>[
//            'class'=>ProductController::class,
//            'method'=>'getAddProduct',
//
//        ],
//        'POST'=>[
//            'class'=>ProductController::class,
//            'method'=>'addProduct',
//        ]
//
//    ],
//    '/cart'=>[
//        'GET'=>[
//            'class'=>CartController::class,
//            'method'=>'getCart'
//        ]
//    ],
//    '/create-order'=>[
//        'GET'=>[
//            'class'=>OrderController::class,
//            'method'=>'getCheckoutOrderForm',
//
//        ],
//        'POST'=>[
//            'class'=>OrderController::class,
//            'method'=>'handleCheckoutOrder',
//        ]
//    ],
//    '/user-orders'=>[
//        'GET'=>[
//            'class'=>CartController::class,
//            'method'=>'getCart'
//        ]
//    ],
//
//];