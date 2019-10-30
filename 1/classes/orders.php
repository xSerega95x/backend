<?php
require_once "db.php";

class order{
    private $db;
    public function __construct(){
        $this->db = new Db();
    }
    public function addOrder($user_id, $book_id, $status = "'Ordered'"){
        self::removeWish($user_id, $book_id);
        $sql = "INSERT INTO Orders VALUES(null, :book_id, :user_id, :order_status);";
        $prep = [ "book_id" => $book_id, "user_id" => $user_id, "order_status" => $status];
        $this->db->editDb($sql, $prep);
    }
    public function removeOrder($user_id, $order_id){
        $sql = "DELETE FROM Orders WHERE user_id = :user_id and order_id = :order_id;";
        $prep = [ "user_id" => $user_id, "order_id" => $order_id];
        $this->db->editDb($sql, $prep);
    }
    public function getOrder($user_id){
        $sql = "SELECT * FROM Orders WHERE user_id = $user_id;";
        return $this->db->getDb($sql);
    }
    public function getStatus($user_id){
        $sql = "SELECT book_id, order_status FROM Orders WHERE user_id = $user_id";
        return $this->db->getDb($sql);
    }
    public function addWish($user_id, $book_id){
        $sql = "INSERT INTO Wish VALUES(null, :book_id, :user_id);";
        $prep = [ "book_id" => $book_id, "user_id" => $user_id];
        $this->db->editDb($sql, $prep);
    }
    public function removeWish($user_id, $book_id){
        $sql = "DELETE FROM Wish WHERE user_id = :user_id and book_id = :book_id;";
        $prep = [ "user_id" => $user_id, "book_id" => $book_id];
        $this->db->editDb($sql, $prep);
    }
    public function getWish($user_id){
        $sql = "SELECT * FROM Wish WHERE user_id = $user_id;";
        return $this->db->getDb($sql);
    }
}