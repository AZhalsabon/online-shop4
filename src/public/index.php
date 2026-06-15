<?php

$autoloadCore = function (string $className){

    $path = "../Core/$className.php";
    if(file_exists($path)){
        require_once $path;
        return true;
    }

    return false;
};

$autoloadControllers = function (string $className){

    $path = "../Controllers/$className.php";
    if(file_exists($path)){
        require_once $path;
        return true;
    }

    return false;
};

$autoloadModel = function (string $className){

    $path = "../Model/$className.php";
    if(file_exists($path)){
        require_once $path;
        return true;
    }

    return false;
};

$autoloadViews = function (string $className){

    $path = "../Views/$className.php";
    if(file_exists($path)){
        require_once $path;
        return true;
    }

    return false;
};

spl_autoload_register($autoloadCore);
spl_autoload_register($autoloadControllers);
spl_autoload_register($autoloadModel);
spl_autoload_register($autoloadViews);

$app = new App();
$app->run();


//
//$requestUri = $_SERVER['REQUEST_URI'];
//$requestMethod = $_SERVER['REQUEST_METHOD'];
//
//
//if ($requestUri === '/registration'){
//    require_once '../Controllers/UserController.php';
//    $user = new UserController();
//
//    if($requestMethod === 'GET'){
//        $user->getRegistrate();
//    }elseif($requestMethod === 'POST'){
//        $user->registrate();
//    }else{
//        echo "$requestMethod для адреса $requestUri  не поддерживается";
//    }
//
//
//}elseif ($requestUri === '/login'){
//    require_once '../Controllers/UserController.php';
//    $user = new UserController();
//
//    if($requestMethod ==='GET'){
//        $user->getLogin();
//    }elseif($requestMethod === 'POST'){
//        $user->login();
//    }else{
//        echo "$requestMethod для адреса $requestUri  не поддерживается";
//    }
//
//}elseif($requestUri === '/catalog'){
//    require_once '../Controllers/ProductController.php';
//    $product = new ProductController();
//
//    if ($requestMethod === 'GET'){
//        $product->getDataCatalog();
//    }elseif($requestMethod === 'POST'){
//        $product->getCatalog();
//    }else{
//        echo "$requestMethod для адреса $requestUri  не поддерживается";
//    }
//
//}elseif($requestUri === '/profile'){
//    require_once '../Controllers/UserController.php';
//    $user = new UserController();
//
//    if($requestMethod === 'GET'){
//        $user->getDataProfile();
//    }elseif($requestMethod === 'POST'){
//        $user->getProfile();
//    }else{
//        echo "$requestMethod для адреса $requestUri  не поддерживается";
//    }
//
//}elseif($requestUri === '/edit-profile'){
//    require_once '../Controllers/UserController.php';
//    $user = new UserController();
//
//    if($requestMethod === 'GET'){
//        $user->getEditProfile();
//    }elseif($requestMethod === 'POST'){
//        $user->editProfile();
//    }else{
//        echo "$requestMethod для адреса $requestUri  не поддерживается";
//    }
//
//}elseif($requestUri === '/add-product') {
//    require_once '../Controllers/ProductController.php';
//    $product = new ProductController();
//
//    if ($requestMethod === 'GET') {
//        $product->getAddProduct();
//    } elseif ($requestMethod === 'POST') {
//        $product->addProduct();;
//    } else {
//        echo "$requestMethod для адреса $requestUri  не поддерживается";
//    }
//
//
//}else{
//    http_response_code(404);
//    require_once './404.php';
//}
