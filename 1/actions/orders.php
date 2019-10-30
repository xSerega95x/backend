<?php
require_once "../classes/func.php";
require_once "../classes/orders.php";
require_once "../classes/books.php";

if (session_status() == PHP_SESSION_NONE) session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

$Order = new Order();
$Book = new Book();

if( @check($_REQUEST['getorderstatus']) ){
    $orders = $Order->getStatus($user_id);
    for($i = 0; $i < count($orders); ++$i){
        $bookdata = $Book->getOneBook($orders[$i]['book_id']);
        $data[] = [$i+1, $bookdata['name'], $orders[$i]['order_status']];
    }
    print( json_encode($data) );
}
