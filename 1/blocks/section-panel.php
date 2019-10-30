<?php
if (session_status() == PHP_SESSION_NONE) session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

?>
<section class="section-panel">
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <?php if(!empty($user_id)): ?>
                    <a href="../actions/users.php?logout=true" class="nav-link"><?=$_SESSION['login'];?> [exit]</a>
                <?php else: ?>
                    <a class="nav-link active" href="#sign" data-toggle="modal" data-target="#sign">Sign in</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <a class="nav-link <?=!empty($user_id)? '': 'd-none';?>" href="#myaccount" data-toggle="modal" data-target="#myaccount">My Account</a>
            </li>
            <li class="nav-item">
                <?php if(!empty($user_id)): ?>
                    <a class="nav-link" href="#orderstatus" data-toggle="modal" data-target="#orderstatus">Order
                        Status</a>
                <?php endif; ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Help</a>
            </li>
        </ul>
        <!-- Sign In & Registration -->
        <div class="modal fade" id="sign" tabindex="-1" role="dialog" aria-labelledby="signLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- tabs -->
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-signin-tab" data-toggle="pill"
                                   href="#pills-signin" role="tab" aria-controls="pills-signin"
                                   aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-reg-tab" data-toggle="pill" href="#pills-reg"
                                   role="tab" aria-controls="pills-reg" aria-selected="false">Registration</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-signin" role="tabpanel"
                                 aria-labelledby="pills-signin-tab">

                                <form action="user.php" method="post" id="signin" class="px-5 form form-user">
                                    <div class="form-group">
                                        <label for="singin-login">Login</label>
                                        <input type="text" class="form-control" id="singin-login"
                                               placeholder="Enter login" name="signin-login" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="singin-password">Password</label>
                                        <input type="password" class="form-control" id="singin-password"
                                               placeholder="Password" name="signin-password" required>
                                    </div>
                                    <div class="error"></div>
                                    <button type="submit" class="button form-btn">Sing In</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-reg" role="tabpanel"
                                 aria-labelledby="pills-reg-tab">

                                <form action="user.php" method="post" id="registration" class="px-5 form form-user">
                                    <div class="form-group">
                                        <label for="reg-name">Name</label>
                                        <input type="text" class="form-control" id="reg-name"
                                               placeholder="Enter your name" name="reg-name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reg-surname">Surname</label>
                                        <input type="text" class="form-control" id="reg-surname"
                                               placeholder="Enter your surname" name="reg-surname" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reg-address">Address</label>
                                        <input type="text" class="form-control" id="reg-address"
                                               placeholder="Enter Address" name="reg-address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reg-phone">Phone</label>
                                        <input type="text" class="form-control" id="reg-phone"
                                               placeholder="Enter phone" name="reg-phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reg-login">Login</label>
                                        <input type="text" class="form-control" id="reg-login"
                                               placeholder="Enter login" name="reg-login" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="reg-password">Password</label>
                                        <input type="password" class="form-control" id="reg-password"
                                               placeholder="Password" name="reg-password" required>
                                    </div>
                                    <div class="error"></div>
                                    <button type="submit" class="button form-btn">Registration</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- SignIn & Registration -->

        <!-- My account -->
        <div class="modal fade" id="myaccount" tabindex="-1" role="dialog" aria-labelledby="myaccountLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="px-5 modal-title" id="myaccountLabel">My account</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="user.php" method="post" id="myaccount" class="px-5 form form-user">
                            <div class="form-group">
                                <label for="myaccount-name">Name</label>
                                <input type="text" class="form-control" id="myaccount-name" placeholder="your name"
                                       name="myaccount-name" required>
                            </div>
                            <div class="form-group">
                                <label for="reg-surname">Surname</label>
                                <input type="text" class="form-control" id="myaccount-surname"
                                       placeholder="your surname" name="myaccount-surname" required>
                            </div>
                            <div class="form-group">
                                <label for="myaccount-address">Address</label>
                                <input type="text" class="form-control" id="myaccount-address" placeholder="Address"
                                       name="myaccount-address" required>
                            </div>
                            <div class="form-group">
                                <label for="myaccount-address">Phone</label>
                                <input type="text" class="form-control" id="myaccount-phone" placeholder="phone"
                                       name="myaccount-phone" required>
                            </div>
                            <div class="form-group">
                                <label for="myaccount-login">Login</label>
                                <input type="text" class="form-control" id="myaccount-login" placeholder="login"
                                       name="myaccount-login">
                            </div>
                            <div class="form-group">
                                <label for="myaccount-password">Password</label>
                                <input type="password" class="form-control" id="myaccount-password"
                                       placeholder="Password" name="myaccount-password" required>
                            </div>
                            <div class="error"></div>
                            <button type="submit" class="button form-btn">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- My account -->

        <!-- Order status -->
        <div class="modal fade" id="orderstatus" tabindex="-1" role="dialog" aria-labelledby="orderstatusLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="px-5 modal-title" id="orderstatusLabel">Order status</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="px-5 modal-body">

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Order</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- Order status -->
    </div>
</section>
