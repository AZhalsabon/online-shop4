<?php
session_start();

if (!isset($_SESSION['userId'])) {
    header("Location: /login");
    exit;
}


$pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

$stmt = $pdo->query('SELECT * FROM users WHERE id = ' . $_SESSION['userId']);
$dataUser = $stmt->fetch();


require_once './profile/get_profile.php';
