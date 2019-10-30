<?php
require_once "classes/books.php";
require_once "classes/func.php";

$search = @check($_GET['search']) ? $_GET['search'] : '';
if(empty($search)) header('Location: /');

$Book = new Book();
$books = $Book->search($search);
?>

<?php
include "blocks/header.html";
include "blocks/section-panel.php";
include "blocks/section-header.php";
include "blocks/section-menu.php";
?>

<section class="section-content">
    <div class="container">
        <div class="row">
            <?php include "blocks/content-menu.php"; ?>
            <div class="col-9">
                <section class="content">
                    <div class="row">
                        <?php foreach ($books as $book): ?>
                            <div class="col-6 col-sm-4 col-md-3 col-lg-auto">
                                <a href="detail.php?book=<?= $book['book_id']; ?>">
                                    <div class="card">
                                        <div class="card-discount <?= ($book['discount'] > 0) ? "" : "d-none"; ?>">
                                            <p><?= $book['discount']; ?>%</p><span>Off</span>
                                        </div>
                                        <img src="<?= $book['imglnkp']; ?>"
                                             alt="<?= $book['imglnkp']; ?>" class="card-img-top">
                                        <div class="card-body">
                                            <p class="card-text"><?= $book['short_descr']; ?></p>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-price">$<?= $book['price']; ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <?php if(empty($books) ) print('<h2>nothing found for your request</h2>'); ?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<?php include "blocks/footer.php"; ?>
