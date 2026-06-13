<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: /login");
    exit;
}




$pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll();

//print_r($products);

require_once './catalog/catalog_page.php';
