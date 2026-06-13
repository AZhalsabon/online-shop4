<?php


class User
{
    public function getRegistrate()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        require_once './registration/get_registration.php';
    }

    public function registrate()
    {
        $errors = $this->validateRegistrationForm($_POST);
        if (empty($errors)){

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

            $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email");
            $stmt->execute(['email'=>$email]);
            $count = $stmt->fetchColumn();

            if($count > 0){
                $errors['email'] = "Этот email уже зарегистрирован.";
                require_once './registration/get_registration.php';
            }

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("INSERT INTO users (name,email,password) VALUES (:name,:email,:password)");
            $stmt->execute(['name' => $name,'email' => $email,'password' => $hashedPassword]);

            header("Location: /login");
        }

        require_once './registration/get_registration.php';

    }

    private function validateRegistrationForm(array $arrpost){
        $errors = [];

        if(isset($arrpost['name'])){
            $name = $arrpost['name'];

            if(strlen($name) < 2){
                $errors['name'] = 'имя должно быть больше 2 символов';
            }
        }else{
            $errors['name'] = 'имя должно быть заполнено';
        }

        if(isset($arrpost['email'])){
            $email = $arrpost['email'];

            if(strlen($email) < 2){
                $errors['email'] = 'имя должно быть больше 2 символов';
            } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false){
                $errors['email'] = 'данные неверные';
            }
        }else{
            $errors['email'] = 'email должнен быть заполнен';
        }

        if(isset($arrpost['password'])){
            $password = $arrpost['password'];

            if (strlen($password) < 6 ){
                $errors['password'] = 'праоль должен быть больше 6 символов';
            } elseif ($confirm = $arrpost['confirm'] and $password !== $confirm){
                $errors['confirm'] = 'пароли не совподают';
            }
        }

        return $errors;
    }

    public function getLogin()
    {
        require_once './login/get_login.php';
    }

    public function login()
    {
        $errors = $this->validateLoginForm($_POST);

        if(empty($errors)){

            $useremail = $_POST['useremail'];
            $password = $_POST['password'];

            $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email'=>$useremail]);
            $user = $stmt->fetch();

            if ($user === false){
                $errors['useremail'] = 'email incorrect';
            }else{
                $passwordDb = $user['password'];

                if (password_verify($password, $passwordDb)){

                    session_start();
                    $_SESSION['userId'] = $user['id'];
                    header("Location: /catalog");
                    exit;

                }else{
                    $errors['useremail'] = 'email or password incorrect';
                }
            }

        }
        require_once "./login/get_login.php";

    }

    private function validateLoginForm(array $arrpost): array
    {
        $errors = [];

        if(empty($arrpost['useremail'])){
            $errors['useremail'] = 'Поле email должно быть заполнено';

        }
        if(empty($arrpost['password'])){
            $errors['password'] = 'Поле password должно быть заполнено';

        }

        return $errors;
    }

    public function getProfile()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        require_once './profile/get_profile.php';

    }

    public function getDataProfile()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }


    if (!isset($_SESSION['userId'])) {
        header("Location: /login");
        exit;
    }


    $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');

    $stmt = $pdo->query('SELECT * FROM users WHERE id = ' . $_SESSION['userId']);
    $dataUser = $stmt->fetch();


    require_once './profile/get_profile.php';


    }

    public function getEditProfile()
    {
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        require_once './editProfile/edit_profile_page.php';


    }

    public function editProfile()
    {
        $errors = $this->validateEditProfile($_POST);

        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }

        if (!isset($_SESSION['userId'])) {
            header("Location: /login");
            exit;
        }

        if(empty($errors)){
            $newName = $_POST['name'];
            $newEmail = $_POST['email'];

            $userId = $_SESSION['userId'];

            $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
            $stmt = $pdo->query("SELECT * FROM users WHERE id = $userId");
            $userData = $stmt->fetch();

            if($userData['name'] !== $newName){
                $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
                $stmt = $pdo->prepare("UPDATE users SET name = :name WHERE id = $userId");
                $stmt->execute(['name'=>$newName]);
            }

            if($userData['email'] !== $newEmail){
                $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
                $stmt = $pdo->prepare("UPDATE users SET email = :email WHERE id = $userId");
                $stmt->execute(['email'=>$newEmail]);
            }
            header("Location: /profile");
            exit;
        }

        require_once './editProfile/editProfile_page.php';

    }

    private function validateEditProfile(array $data): array
    {
        $errors = [];

        if(isset($data['name'])){
            $name = $data['name'];
            if(strlen($name) < 3){
                $errors['name'] = "Имя короткое";
            }
        }

        if(isset($data['email'])){
            $name = $data['email'];
            if(strlen($name) < 3){
                $errors['email' ] = "email короткий";
            }elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "некорректный email";
            }
        }else{
            $pdo = new PDO('pgsql:host=postgres_db;port=5432;dbname=mydb','user','pass');
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->execute(['email'=>$data['email']]);
            $user = $stmt->fetch();

            $userId = $_SESSION['userId'];
            if ($user['id'] !== $userId){
                $errors = "Этот Email уже занят";
            }


        }

        return $errors;
    }







}