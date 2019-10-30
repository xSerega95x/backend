<?php
require_once "classes/func.php";
require_once "classes/orders.php";
require_once "classes/books.php";
require_once "classes/users.php";

if (session_status() == PHP_SESSION_NONE) session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if( empty($user_id) ){
    print("you need to log in");
    header("Refresh: 5; url=/");
    exit(1);
}

// Orders
$Order = new Order();
$orders = $Order->getOrder($user_id);

$Book = new Book();
$User = new User();

if( @check($_REQUEST['removeorder']) ){ $Order->removeOrder($user_id, $_REQUEST['removeorder']); updatePage(); }

// Wishlist
$wish = $Order->getWish($user_id);
if( @check($_REQUEST['addwish']) ){ $Order->addWish($user_id, $_REQUEST['addwish']); updatePage(); }
if( @check($_REQUEST['removewish']) ){ $Order->removeWish($user_id, $_REQUEST['removewish']); updatePage(); }
if( @check($_REQUEST['addorder']) ){ $Order->addOrder($user_id, $_REQUEST['addorder']); updatePage(); }
function updatePage(){
    $file = $_SERVER['SCRIPT_NAME'];
    header("Location: $file");
}

$activeTab = isset($_REQUEST['wishlist']) ? 2 : 1;
?>

<?php
include "blocks/header.html";
require_once "blocks/section-panel.php";
require_once "blocks/section-header.php";
require_once "blocks/section-menu.php";
?>

<section class="section-content">
    <div class="container">
        <section class="content">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link <?php ($activeTab == 1) ?  print('active') : ''; ?>" id="order-tab" data-toggle="tab" href="#order" role="tab"
                        aria-controls="order" aria-selected="false">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php ($activeTab == 2) ?  print('active') : ''; ?>" id="wishlist-tab" data-toggle="tab" href="#wishlist" role="tab"
                        aria-controls="wishlist" aria-selected="false">Wishlist</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade <?php ($activeTab == 1) ?  print('show active') : ''; ?>" id="order" role="tabpanel" aria-labelledby="order-tab">
                    <div class="content__backet">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Book</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i = 0; $i < count($orders); ++$i): ?>
                                    <tr>
                                        <th scope="row"><?=$i+1;?></th>
                                        <td><?=$Book->getOneBook($orders[$i]['book_id'])['author'];?></td>
                                        <td><?=$Book->getOneBook($orders[$i]['book_id'])['name'];?></td>
                                        <td>$<?=$Book->getOneBook($orders[$i]['book_id'])['price'];?></td>
                                        <td><?=$User->getData($orders[$i]['user_id'])['address'];?></td>
                                        <td><?=$orders[$i]['order_status'];?></td>
                                        <td><a href="?removeorder=<?=$orders[$i]['order_id'];?>" class="button">Remove</a></td>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade <?php ($activeTab == 2) ?  print('show active') : ''; ?>" id="wishlist" role="tabpanel" aria-labelledby="wishlist-tab">
                    <div class="content__backet">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Book</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i = 0; $i < count($wish); ++$i): ?>
                                    <tr>
                                        <th scope="row"><?=$i+1;?></th>
                                        <td><?=$Book->getOneBook($wish[$i]['book_id'])['author'];?></td>
                                        <td><?=$Book->getOneBook($wish[$i]['book_id'])['name'];?></td>
                                        <td>$<?=$Book->getOneBook($wish[$i]['book_id'])['price'];?></td>
                                        <td>
                                            <a href="?removewish=<?=$wish[$i]['book_id'];?>" class="button">Remove</a>
                                            <a href="?addorder=<?=$wish[$i]['book_id'];?>" class="button">Order</a>
                                        </td>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>
</section>
<?php include "blocks/footer.php"; ?>