<?php

namespace Core;

use Controllers\OrderController;
use Controllers\UserController;
use Controllers\ProductController;
use Controllers\CartController;
use Request\AddProductRequest;

class App
{
    private $routes=[];


    public function run()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        if(isset($this->routes[$requestUri])){
            $routeMethod = $this->routes[$requestUri];

            if(isset($routeMethod)){

                $handler = $routeMethod[$requestMethod];

                $class = $handler['class'];
                $method = $handler['method'];
                $controller = new $class();

                $requestClass = $handler['request'];
                if ($requestClass !== null){

                    if ($requestMethod === 'POST'){
                        $request = new $requestClass($_POST);
                    }elseif ($requestMethod === 'GET'){
                        $request = new $requestClass($_GET);
                    }else{
                        $request = null;
                    }

                    $controller->$method($request);

                }else{
                    $controller->$method();
                }
            }else{
                echo "$requestMethod не поддерживается для $requestUri";
            }
        }else{
            http_response_code(404);
            require_once '../Views/404.php';
        }
    }

    public function addRoutes(string $route,string $routeMethod,string $className,string $method)
    {
        $this->routes[$route][$routeMethod] = [
            'class'=>$className,
            'method'=>$method,
        ];
    }

    public function get(string $route,string $className,string $method,string $requestClass = null)
    {
        $this->routes[$route]['GET'] = [
            'class'=>$className,
            'method'=>$method,
            'request'=>$requestClass,
        ];
    }
    public function post(string $route,string $className,string $method,string $requestClass = null)
    {
        $this->routes[$route]['POST'] = [
            'class'=>$className,
            'method'=>$method,
            'request'=>$requestClass,

        ];
    }

}

