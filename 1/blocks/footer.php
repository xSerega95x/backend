<?php
$g = @check($_REQUEST['genre']) ? $_REQUEST['genre'] : 0;
$mp = "index.php";
?>

<footer class="footer">
    <section class="footer__menu">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-3">
                    <header>Biography & True Stories</header>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 30) echo "active"; ?>" href="<?=$mp;?>?genre=30">General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 31) echo "active"; ?>" href="<?=$mp;?>?genre=31">Diaries, Letters & Journals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 32) echo "active"; ?>" href="<?=$mp;?>?genre=32">Memoirs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 33) echo "active"; ?>" href="<?=$mp;?>?genre=33">True Stories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 34) echo "active"; ?>" href="<?=$mp;?>?genre=34">Generic Exams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 35) echo "active"; ?>" href="<?=$mp;?>?genre=35">GK Titles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 36) echo "active"; ?>" href="<?=$mp;?>?genre=36">Medical Entrance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 37) echo "active"; ?>" href="<?=$mp;?>?genre=37">Other Entrance Exams</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 38) echo "active"; ?>" href="<?=$mp;?>?genre=38">PG Entrance Examinations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 39) echo "active"; ?>" href="<?=$mp;?>?genre=39">Self-help Titles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 40) echo "active"; ?>" href="<?=$mp;?>?genre=40">Sociology</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-3">
                    <header>Professional & Reference</header>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 41) echo "active"; ?>" href="<?=$mp;?>?genre=41">Academic and Reference</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 42) echo "active"; ?>" href="<?=$mp;?>?genre=42">Business Trade</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 43) echo "active"; ?>" href="<?=$mp;?>?genre=43">Engineering and Computer Science</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 44) echo "active"; ?>" href="<?=$mp;?>?genre=44">Humanities, Social Sciences and Languages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 45) echo "active"; ?>" href="<?=$mp;?>?genre=45">Introduction to Computers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 46) echo "active"; ?>" href="<?=$mp;?>?genre=46">Science and Maths</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 47) echo "active"; ?>" href="<?=$mp;?>?genre=47">Trade Business</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 48) echo "active"; ?>" href="<?=$mp;?>?genre=48">English Language & Literature</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 49) echo "active"; ?>" href="<?=$mp;?>?genre=49">English Language Teaching</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 50) echo "active"; ?>" href="<?=$mp;?>?genre=50">Environment Awareness</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 51) echo "active"; ?>" href="<?=$mp;?>?genre=51">Environment Protection</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-3">
                    <header>Earth Sciences</header>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 52) echo "active"; ?>" href="<?=$mp;?>?genre=52">Earth Sciences</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 53) echo "active"; ?>" href="<?=$mp;?>?genre=53">Geography</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 54) echo "active"; ?>" href="<?=$mp;?>?genre=54">The Environment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 55) echo "active"; ?>" href="<?=$mp;?>?genre=55">Regional & Area Planning</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 56) echo "active"; ?>" href="<?=$mp;?>?genre=56">Fantasy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 57) echo "active"; ?>" href="<?=$mp;?>?genre=57">Gay</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 58) echo "active"; ?>" href="<?=$mp;?>?genre=58">Humorous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 59) echo "active"; ?>" href="<?=$mp;?>?genre=59">Interactive</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 60) echo "active"; ?>" href="<?=$mp;?>?genre=60">Legal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 61) echo "active"; ?>" href="<?=$mp;?>?genre=61">Lesbian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 62) echo "active"; ?>" href="<?=$mp;?>?genre=62">Men'S Adventure</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 63) echo "active"; ?>" href="<?=$mp;?>?genre=63">Movie Or Television Tie-In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 64) echo "active"; ?>" href="<?=$mp;?>?genre=64">Mystery & Detective</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 65) echo "active"; ?>" href="<?=$mp;?>?genre=65">Political</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-sm-3">
                    <header>Mathematics</header>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 66) echo "active"; ?>" href="<?=$mp;?>?genre=66">Algebra</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 67) echo "active"; ?>" href="<?=$mp;?>?genre=67">Differential Equations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 68) echo "active"; ?>" href="<?=$mp;?>?genre=68">Discrete Mathematics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 69) echo "active"; ?>" href="<?=$mp;?>?genre=69">Fourier Analysis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 70) echo "active"; ?>" href="<?=$mp;?>?genre=70">Numerical Analysis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 71) echo "active"; ?>" href="<?=$mp;?>?genre=71">Probability</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 72) echo "active"; ?>" href="<?=$mp;?>?genre=72">Statistical Methods/data Analysis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 73) echo "active"; ?>" href="<?=$mp;?>?genre=73">Stochastic And Random Processes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 74) echo "active"; ?>" href="<?=$mp;?>?genre=74">Topology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 75) echo "active"; ?>" href="<?=$mp;?>?genre=75">Statistics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 6) echo "active"; ?>" href="<?=$mp;?>?genre=6">Mathematics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($g == 76) echo "active"; ?>" href="<?=$mp;?>?genre=76">Statistical Methods</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="footer__cards">
        <div class="container">
            <header>We accept all major Credit Card/Debit Card/Internet Banking</header>
            <div class="cards">
                <img src="img/ui/mastercard.jpg" alt="mastercard">
                <img src="img/ui/americanexpress.jpg" alt="americanexpress">
                <img src="img/ui/visa.jpg" alt="visa">
            </div>
        </div>
    </section>
    <section class="footer__copyrights">
        <div class="container">
            <header> Conditions of Use Privacy Notice &copy; 2012-2013, Booksonline, Inc. or its affiliates</header>
        </div>
    </section>
</footer>

<script src="vendors/jquery/jquery-3.4.1.min.js"></script>
<script src="vendors/bootstrap/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>

</html>