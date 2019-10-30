<?php
$g = @check($_REQUEST['genre']) ? $_REQUEST['genre'] : 0;
$mp = "index.php";
?>
<div class="col-3">
    <nav class="menu">
        <header class="menu__header">Categories</header>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item">
                <a class="nav-link <?php if($g == 0) echo "active"; ?>" href="<?=$mp;?>?genre=0">ALL</a>
            </li>
            <li class="nav-item menu__subheader">Fiction & Literature</li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 10) echo "active"; ?>" href="<?=$mp;?>?genre=10">Children</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 11) echo "active"; ?>" href="<?=$mp;?>?genre=11">Science Fiction</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 12) echo "active"; ?>" href="<?=$mp;?>?genre=12">Fantasy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 13) echo "active"; ?>" href="<?=$mp;?>?genre=13">Mystery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 14) echo "active"; ?>" href="<?=$mp;?>?genre=14">Romance</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 15) echo "active"; ?>" href="<?=$mp;?>?genre=15">Horror</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 16) echo "active"; ?>" href="<?=$mp;?>?genre=16">Poetry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 17) echo "active"; ?>" href="<?=$mp;?>?genre=17">Literature</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 18) echo "active"; ?>" href="<?=$mp;?>?genre=18">Crime</a>
            </li>
            <li class="nav-item menu__subheader">Non - Fiction</li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 19) echo "active"; ?>" href="<?=$mp;?>?genre=19">Comic</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 2) echo "active"; ?>" href="<?=$mp;?>?genre=2">Cook</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 20) echo "active"; ?>" href="<?=$mp;?>?genre=20">Psychology</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 7) echo "active"; ?>" href="<?=$mp;?>?genre=7">Medical</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 21) echo "active"; ?>" href="<?=$mp;?>?genre=21">Art</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 22) echo "active"; ?>" href="<?=$mp;?>?genre=22">Photography</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 23) echo "active"; ?>" href="<?=$mp;?>?genre=23">Law</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 24) echo "active"; ?>" href="<?=$mp;?>?genre=24">History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 25) echo "active"; ?>" href="<?=$mp;?>?genre=25">Business</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 1) echo "active"; ?>" href="<?=$mp;?>?genre=1">Computer</a>
            </li>
            <li class="nav-item menu__subheader">Other</li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 26) echo "active"; ?>" href="<?=$mp;?>?genre=26">Baby</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 27) echo "active"; ?>" href="<?=$mp;?>?genre=27">Sex</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 28) echo "active"; ?>" href="<?=$mp;?>?genre=28">Travel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 9) echo "active"; ?>" href="<?=$mp;?>?genre=9">Science</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if($g == 29) echo "active"; ?>" href="<?=$mp;?>?genre=29">Sports</a>
            </li>
        </ul>
    </nav>
</div>
