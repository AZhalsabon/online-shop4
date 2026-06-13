<?php
////echo 'Hello world';
//
//$pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
//
//
////$pdo->exec("INSERT INTO users (name,email,password) VALUES ('Ivan','ivan@','qwerty')");
//
//$stat = $pdo->query("SELECT * FROM users");
//$res = $stat->fetchAll();
//print_r($res);
//echo 'test';
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];


if ($requestUri === '/registration'){
    if($requestMethod === 'GET'){
        require_once './registration/get_registration.php';
    }elseif($requestMethod === 'POST'){
        require_once './registration/handle_registration.php';
    }else{
        echo "$requestMethod для адреса $requestUri  не поддерживается";
    }
    
    
}elseif ($requestUri === '/login'){
    if($requestMethod ==='GET'){
        require_once './login/get_login.php';
    }elseif($requestMethod === 'POST'){
        require_once './login/handle_login.php';
    }else{
        echo "$requestMethod для адреса $requestUri  не поддерживается";
    }

}elseif($requestUri === '/catalog'){
    if ($requestMethod === 'GET'){
        require_once './catalog/catalog.php';
    }elseif($requestMethod === 'POST'){

        require_once './catalog/catalog_page.php';
    }else{
        echo "$requestMethod для адреса $requestUri  не поддерживается";
    }

}elseif($requestUri === '/profile'){
    if($requestMethod === 'GET'){
        require_once './profile/handle_profile.php';
    }elseif($requestMethod === 'POST'){
        require_once './profile/get_profile.php';
    }else{
        echo "$requestMethod для адреса $requestUri  не поддерживается";
    }

}elseif($requestUri === '/edit-profile'){
    if($requestMethod === 'GET'){
        require_once './editProfile/edit_profile_page.php';
    }elseif($requestMethod === 'POST'){
        require_once './editProfile/edit_profile.php';
    }else{
        echo "$requestMethod для адреса $requestUri  не поддерживается";
    }

}elseif($requestUri === '/add-product') {
    if ($requestMethod === 'GET') {
        require_once './addProduct/add_product_form.php';
    } elseif ($requestMethod === 'POST') {
        require_once './addProduct/handle_add_product.php';
    } else {
        echo "$requestMethod для адреса $requestUri  не поддерживается";
    }


}else{
    http_response_code(404);
    require_once './404.php';
}
