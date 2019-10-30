<?php
require_once "classes/func.php";
require_once "classes/books.php";
require_once "classes/comments.php";

$book_id = isset($_GET['book']) ? $_GET['book'] : 1;

$Book = new Book();
$goods = $Book->getOneBook($book_id);

$product = $Book->getProduct(($book_id));

$Comment = new Comment();
$comments = $Comment->getComment($book_id);

$books = $Book->getGenreBooks($goods['genre'], ['bestsellers' => 1], 7)['bestsellers'];

if(@check($_POST['book_id'], $_POST['username'], $_POST['usermail'], $_POST['usermessage'])){
    $Comment->add($_POST['book_id'], $_POST['username'], $_POST['usermail'],$_POST['usermessage']);
}

if (session_status() == PHP_SESSION_NONE) session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
?>

<?php
include "blocks/header.html";
require_once "blocks/section-panel.php";
require_once "blocks/section-header.php";
include "blocks/section-menu.php";
?>
<section class="section-content">
    <div class="container">
        <section class="border-main product">
            <div class="row">
                <div class="col-4">
                    <img src="<?=$goods['imglnkf'];?>" alt="<?=$goods['name']?>" class="img-fluid">
                </div>
                <div class="col-8">
                    <header class="product__header"><?=$goods['name']?></header>
                    <p class="product__text"><?=$goods['full_descr'];?></p>
                    <div class="product__price">
                        <div class="border-main price">
                            <table>
                                <tr>
                                    <td>
                                        <p class="price__header">Our price: <span>$<?=$goods['price'];?></span></p>
                                        <?php if($goods['discount'] > 0): ?>
                                            <p class="price__description">
                                                <?php $exprice = ($goods['price'] / 100 * $goods['discount']) + $goods['price']; ?>
                                                Was $ <?=$exprice;?> Save <?=$goods['discount'];?>%
                                            </p>
                                        <?php endif;?>
                                    </td>
                                    <td>
                                        <a href="order.php?addwish=<?=$goods['book_id'];?>"
                                           class="button price__button <?php if(empty($user_id)) print("auth"); ?>"
                                        >Add to card</a>
                                    </td>
                                </tr>
                            </table>
                            <div class="price__cards">
                                <p class="product__text price__text">
                                    <i class="fas fa-lock"></i> Safe, Secure Shopping</p>
                                <div class="cards">
                                    <img src="img/ui/detail/paypal.jpg" alt="paypal">
                                    <img src="img/ui/detail/mastercard.jpg" alt="mastercard">
                                    <img src="img/ui/detail/visa.jpg" alt="visa">
                                    <img src="img/ui/detail/americanexpress.jpg" alt="americanexpress">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-8">
                <section class="product-details">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab"
                               aria-controls="info" aria-selected="true">Product information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="details-tab" data-toggle="tab" href="#details" role="tab"
                               aria-controls="details" aria-selected="false">Other details</a>
                        </li>
                    </ul>
                    <div class="border-main tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <?=$product['info'];?>
                        </div>
                        <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">Other
                            <?=$product['detail'];?></div>
                    </div>
                </section>
                <section class="border-main comments">
                    <div class="comments__container">
                        <?php foreach($comments as $comment): ?>
                            <div class="comment">
                                <header class="comment__header">Product review</header>
                                <div class="row">
                                    <div class="col-2">
                                        <img src="img/users/no-avatar.jpg" alt="avatar"
                                             class="img-fluid comment__avatar">
                                        <span class="comment__name"><?=$comment['name'];?></span>
                                    </div>
                                    <div class="col-10">
                                        <p class="comment__text">
                                            <?=$comment['message'];?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="comments__message">
                        <header class="comments__header">Write a comment</header>
                        <form action="detail.php" method="post" class="form-comments">
                            <input type="hidden" name="book_id" value="<?=$product['book_id'];?>">
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">Your name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="useremail" class="col-sm-3 col-form-label">email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" id="useremail" name="usermail" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="usermessage" class="col-sm-3 col-form-label">Message</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="usermessage" rows="3" name="usermessage" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <button type="submit" class="pull-right form-button">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </section>
            </div>
            <div class="col-4">
                <aside class="border-main rsidebar">
                    <header class="rsidebar__header">You may also like</header>
                    <?php foreach($books as $book):?>
                        <div class="book">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <img src="<?=$book['imglnkp'];?>"
                                         alt="<?=$book['name'];?>" class="img-fluid book__image">
                                </div>
                                <div class="col-12 col-lg-8">
                                    <header class="book__header"><?=$book['name'];?></header>
                                    <div class="book__price">$<?=$book['price'];?></div>
                                    <form action="detail.php">
                                        <input type="hidden" name="book" value="<?=$book['book_id'];?>">
                                        <button>Read more</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </aside>
            </div>
        </div>
    </div>
</section>

<?php include "blocks/footer.php"; ?>