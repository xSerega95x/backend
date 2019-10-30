<?php
require_once "db.php";

class User{
    private $db;
    private $errors = [
        'login' => "login занят, выберите другой login",
        'login_or_password' => "Вы ввели неверный логин или пароль"
    ];
    public function __construct(){
        $this->db = new Db();
    }
    public function reg($name, $surname, $addr, $phone, $login, $password){
        $dblogins = $this->db->getDb("SELECT login FROM Users");
        foreach($dblogins as $dblogin) if($dblogin['login'] === $login) exit($this->errors['login']);

        $sql = "INSERT INTO Users VALUES(null, :name, :surname, :addr, :phone, :login, :password, :salt);";
        $prep = [
            "name" => $name, "surname" => $surname, "addr" => $addr, "phone" => $phone,
            "login" => $login, "password" => $password, "salt" => rand(10000, 99999)
        ];
        $this->db->editDb($sql, $prep);
        self::login($login, $password);
    }
    public function login($login, $password){
        $sql = "SELECT user_id, password, salt FROM Users WHERE login = \"$login\"";
        $db = $this->db->getDb($sql);
        if(empty($db)) exit($this->errors['login_or_password']);
        $db = $db[0];

        if( md5($db['password'] . $db['salt']) != md5($password . $db['salt']) )
            exit($this->errors['login_or_password']);

        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['user_id'] = $db['user_id'];
    }
    public function logout(){
        session_start();
        unset($_SESSION['user_id']);
        session_destroy();
        header("Location: /");
    }
    public function getData($user_id){
        $sql = "SELECT name, surname, address, phone, login FROM Users WHERE user_id = \"$user_id\"";
        $db = $this->db->getDb($sql);
        if(empty($db)) exit($this->errors['login_or_password']);
        return $db[0];
    }
    public function update($user_id, $name, $surname, $addr, $phone, $login, $password){
        $sql = "UPDATE Users SET name = :name, surname = :surname, address = :addr, phone = :phone, login = :login, password = :password WHERE user_id = :user_id";
        $prep = [ "name" => $name, "surname" => $surname, "addr" => $addr, "phone" => $phone, "login" => $login, "password" => $password, "user_id" => $user_id];
        $this->db->editDb($sql, $prep);
    }
}