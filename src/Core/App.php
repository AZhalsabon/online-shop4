<?php

namespace Core;

use Controllers\OrderController;
use Controllers\UserController;
use Controllers\ProductController;
use Controllers\CartController;

class App
{
    private $routs=[
        '/registration' =>[
            'GET'=>[
                'class'=>UserController::class,
                'method'=>'getRegistrate',
            ],
            'POST'=>[
                'class'=>UserController::class,
                'method'=>'registrate',
            ],

        ],
        '/login' =>[
            'GET'=>[
                'class'=>UserController::class,
                'method'=>'getLogin',
            ],
            'POST'=>[
                'class'=>UserController::class,
                'method'=>'login',
            ],

        ],
        '/catalog' =>[
            'GET'=>[
                'class'=>ProductController::class,
                'method'=>'getDataCatalog',
            ]
        ],
        '/profile' => [
            'GET'=>[
                'class'=>UserController::class,
                'method'=>'getDataProfile',
            ]
        ],
        '/edit-profile'=>[
            'GET'=>[
                'class'=>UserController::class,
                'method'=>'getEditProfile'
            ],
            'POST'=>[
                'class'=>UserController::class,
                'method'=>'editProfile',
            ]

        ],
        '/add-product'=>[
            'GET'=>[
                'class'=>ProductController::class,
                'method'=>'getAddProduct',

            ],
            'POST'=>[
                'class'=>ProductController::class,
                'method'=>'addProduct',
            ]

        ],
        '/cart'=>[
            'GET'=>[
                'class'=>CartController::class,
                'method'=>'getCart'
            ]
        ],
        '/create-order'=>[
            'GET'=>[
                'class'=>OrderController::class,
                'method'=>'getCheckoutOrderForm',

            ],
            'POST'=>[
                'class'=>OrderController::class,
                'method'=>'handleCheckoutOrder',
            ]
        ]
    ];

    public function run()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if(isset($this->routs[$requestUri])){
            $routeMethod = $this->routs[$requestUri];

            if(isset($routeMethod)){

                $handler = $routeMethod[$requestMethod];

                $class = $handler['class'];
                $method = $handler['method'];


                $controller = new $class();
                $controller->$method();

            }else{
                echo "$requestMethod не поддерживается для $requestUri";
            }
        }else{
            http_response_code(404);
            require_once '../Views/404.php';
        }
    }
}

