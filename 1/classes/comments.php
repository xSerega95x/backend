<?php
require_once "db.php";

 class Comment{
     private $db;
     public function __construct(){
         $this->db = new Db();
     }
     public function add($book_id, $name, $email, $message){
         $sql = "INSERT INTO Comments VALUES(null, :book_id, :name, :email, :message)";
         $prep= [ "book_id" => $book_id,"name" => $name, "email" => $email, "message" => $message];
         $this->db->editDb($sql, $prep);
         header("Location: ?book=$book_id");
     }
     public function remove($comment_id){
         $sql = "DELETE FROM Comments WHERE comment_id = :comment_id";
         $prep = ["comment_id" => $comment_id];
         $this->db->editDb($sql, $prep);
     }
     public function getComment($book_id){
         $sql = "SELECT comment_id, name, message FROM Comments WHERE book_id = $book_id;";
         return $this->db->getDb($sql);
     }
 }