<?php
require_once "classes/orders.php";
require_once "classes/books.php";

if (session_status() == PHP_SESSION_NONE) session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if(!empty($user_id)){
    $Order = new Order();
    $Book = new Book();
    $orders = $Order->getOrder($user_id);
    $wishs = $Order->getWish($user_id);

    for($i = 0, $order_price = 0; $i < count($orders); ++$i){
        $book_id = $orders[$i]['book_id'];
        $order_price += $Book->getOneBook( $book_id )['price'];
    }

    $order_counts = count($orders);
    $wish_counts = count($wishs);
}
?>

<header class="header">
    <div class="container">
        <div class="navbar navbar-expand-lg">
            <div class="pb-sm-4 header__container">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <a class="pl-3 navbar-brand" href="/">
                    <img src="img/ui/logo.jpg" alt="logo">
                </a>

                <form action="search.php" method="get" class="form">
                    <input class="form__input" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="form__button" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        Search
                    </button>
                </form>
            </div>
            <?php if(!empty($user_id)): ?>
                <div class="ml-lg-auto header__container">
                    <div class="backet">
                        <div class="backet__container">
                            <i class="fa fa-shopping-cart backet__icon" aria-hidden="true"></i>
                            <h2 class="backet__header">Your cart <span>(<?=$order_counts;?> items)</span></h2>
                        </div>
                        <div class="backet__container">
                            <p class="backet__price">$<?=$order_price;?></p>
                            <a href="order.php?order" class="backet__button">Checkout</a>
                        </div>
                    </div>
                    <div class="wishlist">
                        <a href="order.php?wishlist">
                            <i class="fas fa-star wishlist__icon"></i>
                            <h2 class="wishlist__header">Wish list</h2>
                            <span class="wishlist__count"><?=$wish_counts;?></span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>
