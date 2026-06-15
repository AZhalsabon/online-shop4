<?php

class App
{
    private $routs=[
        '/registration' =>[
            'GET'=>[
                'class'=>'UserController',
                'method'=>'getRegistrate',
            ],
            'POST'=>[
                'class'=>'UserController',
                'method'=>'registrate',
            ],

        ],
        '/login' =>[
            'GET'=>[
                'class'=>'UserController',
                'method'=>'getLogin',
            ],
            'POST'=>[
                'class'=>'UserController',
                'method'=>'login',
            ],

        ],
        '/catalog' =>[
            'GET'=>[
                'class'=>'ProductController',
                'method'=>'getDataCatalog',
            ]
        ],
        '/profile' => [
            'GET'=>[
                'class'=>'UserController',
                'method'=>'getDataProfile',
            ]
        ],
        '/edit-profile'=>[
            'GET'=>[
                'class'=>'UserController',
                'method'=>'getEditProfile'
            ],
            'POST'=>[
                'class'=>'UserController',
                'method'=>'editProfile',
            ]

        ],
        '/add-product'=>[
            'GET'=>[
                'class'=>'ProductController',
                'method'=>'getAddProduct',

            ],
            'POST'=>[
                'class'=>'ProductController',
                'method'=>'addProduct',
            ]

        ],
        '/cart'=>[
            'GET'=>[
                'class'=>'CartController',
                'method'=>'getCart'
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

                require_once "../Controllers/$class.php";


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

//        $routsMethod = $this->routs[$requestUri];
//
//        $handler = $routsMethod[$requestMethod];
//
//        $class = $handler['class'];
//        $method = $handler['method'];
//
//        $controller = new $class();
//        $controller->$method();


//    public function run()
//    {
//
//        $requestUri = $_SERVER['REQUEST_URI'];
//        $requestMethod = $_SERVER['REQUEST_METHOD'];
//
//
//        if ($requestUri === '/registration'){
//            require_once '../Controllers/UserController.php';
//            $user = new UserController();
//
//            if($requestMethod === 'GET'){
//                $user->getRegistrate();
//            }elseif($requestMethod === 'POST'){
//                $user->registrate();
//            }else{
//                echo "$requestMethod для адреса $requestUri  не поддерживается";
//            }
//
//
//        }elseif ($requestUri === '/login'){
//            require_once '../Controllers/UserController.php';
//            $user = new UserController();
//
//            if($requestMethod ==='GET'){
//                $user->getLogin();
//            }elseif($requestMethod === 'POST'){
//                $user->login();
//            }else{
//                echo "$requestMethod для адреса $requestUri  не поддерживается";
//            }
//
//        }elseif($requestUri === '/catalog'){
//            require_once '../Controllers/ProductController.php';
//            $product = new ProductController();
//
//            if ($requestMethod === 'GET'){
//                $product->getDataCatalog();
//            }elseif($requestMethod === 'POST'){
//                $product->getCatalog();
//            }else{
//                echo "$requestMethod для адреса $requestUri  не поддерживается";
//            }
//
//        }elseif($requestUri === '/profile'){
//            require_once '../Controllers/UserController.php';
//            $user = new UserController();
//
//            if($requestMethod === 'GET'){
//                $user->getDataProfile();
//            }elseif($requestMethod === 'POST'){
//                $user->getProfile();
//            }else{
//                echo "$requestMethod для адреса $requestUri  не поддерживается";
//            }
//
//        }elseif($requestUri === '/edit-profile'){
//            require_once '../Controllers/UserController.php';
//            $user = new UserController();
//
//            if($requestMethod === 'GET'){
//                $user->getEditProfile();
//            }elseif($requestMethod === 'POST'){
//                $user->editProfile();
//            }else{
//                echo "$requestMethod для адреса $requestUri  не поддерживается";
//            }
//
//        }elseif($requestUri === '/add-product') {
//            require_once '../Controllers/ProductController.php';
//            $product = new ProductController();
//
//            if ($requestMethod === 'GET') {
//                $product->getAddProduct();
//            } elseif ($requestMethod === 'POST') {
//                $product->addProduct();;
//            } else {
//                echo "$requestMethod для адреса $requestUri  не поддерживается";
//            }
//
//
//        }else{
//            http_response_code(404);
//            require_once './404.php';
//        }
//
//    }