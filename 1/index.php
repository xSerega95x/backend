<?php
require_once "classes/books.php";
require_once "classes/func.php";

$g = @check($_REQUEST['genre']) ? $_REQUEST['genre'] : 0;

$type = [
        'bestsellers' => (   @check($_REQUEST['bestsellers'])   ? $_REQUEST['bestsellers']   : 1 ),
        'newarrivals' => (   @check($_REQUEST['newarrivals'])   ? $_REQUEST['newarrivals']   : 1 ),
        'usedbooks' => (     @check($_REQUEST['usedbooks'])     ? $_REQUEST['usedbooks']     : 1 ),
        'specialoffers' => ( @check($_REQUEST['specialoffers']) ? $_REQUEST['specialoffers'] : 1 )
];

$Book = new Book();
$books = $Book->getGenreBooks($g, $type);

$cur_tab = selectCurrentTab($type);
?>

<?php
include "blocks/header.html";
include "blocks/section-panel.php";
include "blocks/section-header.php";
include "blocks/section-menu.php";
include "blocks/section-slider.html";
?>

<section class="section-content">
    <div class="container">
        <div class="row">
            <?php include "blocks/content-menu.php"; ?>
            <div class="col-9">
                <section class="content">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link <?=($cur_tab == 1) ? 'active' : '';?>" id="bestsellers-tab" data-toggle="tab" href="#bestsellers"
                               role="tab" aria-controls="bestsellers" aria-selected="true">Best sellers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=($cur_tab == 2) ? 'active' : '';?>" id="newarrivals-tab" data-toggle="tab" href="#newarrivals"
                               role="tab" aria-controls="newarrivals" aria-selected="false">New Arrivals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=($cur_tab == 3) ? 'active' : '';?>" id="usedbooks-tab" data-toggle="tab" href="#usedbooks" role="tab"
                               aria-controls="usedbooks" aria-selected="false">Used Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?=($cur_tab == 4) ? 'active' : '';?>" id="specialoffers-tab" data-toggle="tab" href="#specialoffers"
                               role="tab" aria-controls="specialoffers" aria-selected="false">Special Offers</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade <?=($cur_tab == 1) ? ' show active' : '';?>" id="bestsellers" role="tabpanel"
                             aria-labelledby="bestsellers-tab">
                            <div class="row">
                                <?php foreach($books["bestsellers"] as $book): ?>
                                <div class="col-6 col-sm-4 col-md-3 col-lg-auto">
                                    <a href="detail.php?book=<?=$book['book_id'];?>">
                                        <div class="card">
                                            <div class="card-discount <?=($book['discount'] > 0) ? "" : "d-none"; ?>">
                                                <p><?=$book['discount']; ?>%</p><span>Off</span>
                                            </div>
                                            <img src="<?=$book['imglnkp']; ?>"
                                                 alt="<?=$book['imglnkp']; ?>" class="card-img-top">
                                            <div class="card-body">
                                                <p class="card-text"><?=$book['short_descr']; ?></p>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-price">$<?=$book['price']; ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; ?>
                            </div>

                            <nav aria-label="page">
                                <ul class="justify-content-end pagination page">
                                    <?php $Book->printPages($g, "bestsellers", $type['bestsellers']);?>
                                </ul>
                            </nav>
                        </div>
                        <div class="tab-pane fade <?=($cur_tab == 2) ? ' show active' : '';?>" id="newarrivals" role="tabpanel"
                             aria-labelledby="newarrivals-tab">
                            <div class="row">
                                <?php foreach($books["newarrivals"] as $book): ?>
                                    <div class="col-6 col-sm-4 col-md-3 col-lg-auto">
                                        <a href="detail.php?book=<?=$book['book_id'];?>">
                                            <div class="card">
                                                <div class="card-discount <?=($book['discount'] > 0) ? "" : "d-none"; ?>">
                                                    <p><?=$book['discount']; ?>%</p><span>Off</span>
                                                </div>
                                                <img src="<?=$book['imglnkp']; ?>"
                                                     alt="<?=$book['imglnkp']; ?>" class="card-img-top">
                                                <div class="card-body">
                                                    <p class="card-text"><?=$book['short_descr']; ?></p>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-price">$<?=$book['price']; ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <nav aria-label="page">
                                <ul class="justify-content-end pagination page">
                                    <?php $Book->printPages($g, "newarrivals", $type['newarrivals']);?>
                                </ul>
                            </nav>
                        </div>

                        <div class="tab-pane fade <?=($cur_tab == 3) ? ' show active' : '';?>" id="usedbooks" role="tabpanel" aria-labelledby="usedbooks-tab">
                            <div class="row">
                                <?php foreach($books["usedbooks"] as $book): ?>
                                    <div class="col-6 col-sm-4 col-md-3 col-lg-auto">
                                        <a href="detail.php?book=<?=$book['book_id'];?>">
                                            <div class="card">
                                                <div class="card-discount <?=($book['discount'] > 0) ? "" : "d-none"; ?>">
                                                    <p><?=$book['discount']; ?>%</p><span>Off</span>
                                                </div>
                                                <img src="<?=$book['imglnkp']; ?>"
                                                     alt="<?=$book['imglnkp']; ?>" class="card-img-top">
                                                <div class="card-body">
                                                    <p class="card-text"><?=$book['short_descr']; ?></p>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-price">$<?=$book['price']; ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <nav aria-label="page">
                                <ul class="justify-content-end pagination page">
                                    <?php $Book->printPages($g, "usedbooks", $type['usedbooks']);?>
                                </ul>
                            </nav>
                        </div>
                        <div class="tab-pane fade <?=($cur_tab == 4) ? ' show active' : '';?>" id="specialoffers" role="tabpanel"
                             aria-labelledby="specialoffers-tab">
                            <div class="row">
                                <?php foreach($books["specialoffers"] as $book): ?>
                                    <div class="col-6 col-sm-4 col-md-3 col-lg-auto">
                                        <a href="detail.php?book=<?=$book['book_id'];?>">
                                            <div class="card">
                                                <div class="card-discount <?=($book['discount'] > 0) ? "" : "d-none"; ?>">
                                                    <p><?=$book['discount']; ?>%</p><span>Off</span>
                                                </div>
                                                <img src="<?=$book['imglnkp']; ?>"
                                                     alt="<?=$book['imglnkp']; ?>" class="card-img-top">
                                                <div class="card-body">
                                                    <p class="card-text"><?=$book['short_descr']; ?></p>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-price">$<?=$book['price']; ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <nav aria-label="page">
                                <ul class="justify-content-end pagination page">
                                    <?php $Book->printPages($g, "specialoffers", $type['specialoffers']);?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<?php include "blocks/footer.php"; ?>
