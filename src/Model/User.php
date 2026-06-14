<?php


class User
{
    public function getByEmail(string $email): array
    {
        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch();

        return $result;


    }

    public function updateEmailById(string $email, int $userId)
    {
        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
        $stmt = $pdo->prepare("UPDATE users SET email = :email WHERE id = $userId");
        $stmt->execute(['email'=>$email]);
    }

    public function updateNameById(string $name, int $userId)
    {
        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
        $stmt = $pdo->prepare("UPDATE users SET name = :name WHERE id = $userId");
        $stmt->execute(['name'=>$name]);
    }

    public function getBySessionId(string $sessionId)
    {
        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

        $stmt = $pdo->query('SELECT * FROM users WHERE id = ' . $sessionId);
        $dataUser = $stmt->fetch();
        return $dataUser;
    }

    public function addUserDb(string $name,string $email,$hashedPassword)
    {
        $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

        $stmt = $pdo->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
        $stmt->execute(['name' => $name,'email' => $email,'password' => $hashedPassword]);
    }






}