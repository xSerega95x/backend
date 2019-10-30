<?php
$g = @check($_REQUEST['genre']) ? $_REQUEST['genre'] : 0;
$mp = "index.php";
?>
<section class="section-menu">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if($g == 1) echo "active"; ?>" href="<?=$mp;?>?genre=1">Computers</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($g == 2) echo "active"; ?>" href="<?=$mp;?>?genre=2">Cooking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($g == 3) echo "active"; ?>" href="<?=$mp;?>?genre=3">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($g == 4) echo "active"; ?>" href="<?=$mp;?>?genre=4">Fiction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($g == 5) echo "active"; ?>" href="<?=$mp;?>?genre=5">Health</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($g == 6) echo "active"; ?>" href="<?=$mp;?>?genre=6">Mathematics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($g == 7) echo "active"; ?>" href="<?=$mp;?>?genre=7">Medical</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($g == 8) echo "active"; ?>" href="<?=$mp;?>?genre=8">Reference</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($g == 9) echo "active"; ?>" href="<?=$mp;?>?genre=9">Science</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>
