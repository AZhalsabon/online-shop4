<?php
//require_once"../Model/Model.php";
namespace Model;
class User extends Model
{
    public function getByEmail(string $email)
    {
        $stmt = $this->PDO->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email'=>$email]);

        return $stmt->fetch();
    }

    public function updateEmailById(string $email, int $userId)
    {
        $stmt = $this->PDO->prepare("UPDATE users SET email = :email WHERE id = $userId");
        $stmt->execute(['email'=>$email]);
    }

    public function updateNameById(string $name, int $userId)
    {
        $stmt = $this->PDO->prepare("UPDATE users SET name = :name WHERE id = $userId");
        $stmt->execute(['name'=>$name]);
    }

    public function getBySessionId(string $sessionId)
    {

        $stmt = $this->PDO->query('SELECT * FROM users WHERE id = ' . $sessionId);
        $dataUser = $stmt->fetch();

        return $dataUser;
    }

    public function addUserDb(string $name,string $email,$hashedPassword)
    {
        $stmt = $this->PDO->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
        $stmt->execute(['name' => $name,'email' => $email,'password' => $hashedPassword]);
    }

}