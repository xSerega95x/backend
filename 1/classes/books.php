<?php
require_once "db.php";

 class Book{
     private const NUM_ON_PAGE = 10;
     private const NUM_PAGES = 6;
     private $db;
     public function __construct(){
         $this->db = new Db();
     }
     function addBook($author, $name, $short_descr, $long_descr, $quantity, $price, $discount, $genre, $imglnkp, $imglnkf){
         $sql = "INSERT INTO Books VALUES(null, :author, :name, :short_descr, :long_descr, :q, :price, :discount, :genre, :imglnkp, :imglnkf)";
         $prep = [
             "author" => $author, "name" => $name, "short_descr" => $short_descr, "long_descr" => $long_descr, "q" => $quantity,
             "price" => $price, "discount" => $discount, "genre" => $genre, "imglnkp" => $imglnkp, "imglnkf" => $imglnkf
             ];
         $this->db->editDb($sql, $prep);
     }
     public function removeBook($book_id){
         $sql = "DELETE FROM Books WHERE book_id = :book_id";
         $prep = ["book_id" => $book_id];
         $this->db->editDb($sql, $prep);
     }
     public function getOneBook($book_id){
         $sql = "SELECT * FROM Books WHERE book_id = $book_id";
         return $this->db->getDb($sql)[0];
     }
     public function getGenreBooks($genre = 0, $types, $limit = self::NUM_ON_PAGE){
         $genre = ($genre == 0) ? "" : "WHERE (books.genre = $genre)";
         $p_sql = ["SELECT books.book_id FROM books INNER JOIN ", " ON books.book_id = ", ".book_id $genre "];

         foreach($types as $key => $page){
             if(@!check($page)) $page = 1;
             $sql = $p_sql[0] . $key . $p_sql[1] . $key . $p_sql[2];
             $sql .= " LIMIT " . ($limit * $page - $limit) . ', ' . $limit;
             $books_id[$key] = $this->db->getDb($sql);
         }

         foreach($books_id as $key => $id) $result[$key] = self::_getAllBooks($id);
         return $result;
     }
     public function addBestseller($book_id){
         $sql = "INSERT INTO Bestsellers VALUES(null, :book_id)";
         $prep = ["book_id" => $book_id];
         $this->db->editDb($sql, $prep);
     }
     public function removeBestseller($bs_id){
         $sql = "DELETE FROM Books WHERE bs_id = :bs_id";
         $prep = ["bs_id" => $bs_id];
         $this->db->editDb($sql, $prep);
     }
     public function addNewArrivals($book_id){
         $sql = "INSERT INTO NewArrivals VALUES(null, :book_id)";
         $prep = ["book_id" => $book_id];
         $this->db->editDb($sql, $prep);
     }
     public function removeNewArrivals($na_id){
         $sql = "DELETE FROM Books WHERE na_id = :na_id";
         $prep = ["na_id" => $na_id];
         $this->db->editDb($sql, $prep);
     }
     public function addUsedBooks($book_id){
         $sql = "INSERT INTO UsedBooks VALUES(null, :book_id)";
         $prep = ["book_id" => $book_id];
         $this->db->editDb($sql, $prep);
     }
     public function removeUsedBooks($ub_id){
         $sql = "DELETE FROM UsedBooks WHERE ub_id = :ub_id";
         $prep = ["ub_id" => $ub_id];
         $this->db->editDb($sql, $prep);
     }
     public function addSpecialOffers($book_id){
         $sql = "INSERT INTO SpecialOffers VALUES(null, :book_id)";
         $prep = ["book_id" => $book_id];
         $this->db->editDb($sql, $prep);
     }
     public function removeSpecialOffers($so_id){
         $sql = "DELETE FROM SpecialOffers WHERE so_id = :so_id";
         $prep = ["so_id" => $so_id];
         $this->db->editDb($sql, $prep);
     }
     public function printPages($genre, $type = "bestsellers", $curpage = 1){
         if(empty($curpage)) $curpage = 1;

         $g = ($genre == 0) ? "" : "WHERE (books.genre = $genre)";
         $sql = "SELECT count(Books.book_id) as count FROM Books INNER JOIN $type ON books.book_id = $type.book_id $g";
         $count = ceil( $this->db->getDb($sql)[0]['count'] / self::NUM_ON_PAGE );

         if(empty($count)) return "";
         $li = ['<li class="page-item ', '"><a class="page-link" href=', '</a></li>'];

         $minPage = ($curpage < 4) ? 1 : $curpage - self::NUM_PAGES / 2;
         $maxPage = ($curpage < 4) ? self::NUM_PAGES: $curpage + self::NUM_PAGES / 2 -1;

         $maxPage = $maxPage < $count ? $maxPage : $count;

         for($i = $minPage, $result = ""; $i <= $maxPage ; ++$i){
             $active = ($i == $curpage) ? " active " : "";
             $result .= $li[0] . $active . $li[1] . '"?genre=' . $genre . "&$type=" . $i . '">' . $i . $li[2];
         }
         print( $result );
     }
     public function search($search){
         $sql = "SELECT * FROM Books WHERE name LIKE '%$search%'";
         return $this->db->getDb($sql);
     }
     public function getProduct($book_id){
         $sql = "SELECT * FROM Products WHERE book_id = $book_id";
         return $this->db->getDb($sql)[0];
     }
     private function _getAllBooks($book_ids){
         if(empty($book_ids)) return [];

         foreach($book_ids as $book) $result[] = self::getOneBook($book['book_id']);
         return empty($result) ? [] : $result;
     }
 }