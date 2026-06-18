<?php
//require_once"../Model/Model.php";
namespace Model;
class User extends Model
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function getByEmail(string $email):self|null
    {
        $stmt = $this->PDO->prepare("SELECT * FROM users WHERE email = :email");

        //getuser
        $stmt->execute(['email'=>$email]);

        $user = $stmt->fetch();

        if($user === false){
            return null;
        }else{
            $obj = new self();
            $obj->id = $user['id'];
            $obj->name = $user['name'];
            $obj->email = $user['email'];
            $obj->password = $user['password'];
            return $obj;
        }
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

        //getuser
        $dataUser = $stmt->fetch();

        if($dataUser === false){
            return null;
        }else{
            $obj = new self();
            $obj->id = $dataUser['id'];
            $obj->name = $dataUser['name'];
            $obj->email = $dataUser['email'];
            $obj->password = $dataUser['password'];
            return $obj;
        }

        return $dataUser;
    }

    public function addUserDb(string $name,string $email,$hashedPassword)
    {
        $stmt = $this->PDO->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
        $stmt->execute(['name' => $name,'email' => $email,'password' => $hashedPassword]);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }



}