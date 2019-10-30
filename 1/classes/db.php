<?php

class Db{
    /*type, host, login, password*/
    private $db_conf = ["mysql", "127.0.0.1:3306", "root", ""];

    private $link;
    public function __construct(){
        list($type, $addr, $login, $password) = $this->db_conf;
        try{
            $this->link = new PDO("$type:host=$addr;dbname=BooksOnline", $login, $password);
            return $this->link;
        }
        catch (PDOException $e) {
            self::_createDB($type, $addr, $login, $password);
        }
    }
    public function __destruct(){
        $this->link = null;
    }
    private function _createDB($type, $addr, $login, $password){
        try{
            $this->link = new PDO("$type:host=$addr", $login, $password);
            $sql = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/sql/db.sql');
            $this->link->exec($sql);
            self::_addContent();
        }
        catch(PDOException $e){
            die("DB ERROR: " . $e->getMessage());
        }
    }
    // Only as example. Usually mysql -uroot -proot BooksOnline < content.sql
    private function _addContent(){
        try{
            $sql = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/sql/content.sql');
            $this->link->exec($sql);
        }
        catch(PDOException $e){
            die("DB ERROR: ". $e->getMessage());
        }
    }
    public function editDb($sql, $prep){
        $dbp = $this->link->prepare($sql);
        $dbp->execute($prep);
    }
    public function getDb($sql){
        $dbq = $this->link->query($sql) or die("ERROR in SQL: " . $sql);
        return $dbq->fetchAll(PDO::FETCH_ASSOC);
    }
}