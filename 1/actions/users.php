<?php
require_once "../classes/func.php";
require_once "../classes/users.php";

$registration = @check(
    $_POST['reg-name'],$_POST['reg-surname'],$_POST['reg-address'],
    $_POST['reg-phone'], $_POST['reg-login'],$_POST['reg-password']
);
$signin = @check($_POST['signin-login'], $_POST['signin-password']);
$signout = @check($_REQUEST['logout']);
$myaccount = @check(
    $_POST['myaccount-name'], $_POST['myaccount-surname'], $_POST['myaccount-address'],
    $_POST['myaccount-phone'], $_POST['myaccount-login'], $_POST['myaccount-password']
);
$getdata = @check($_GET['myaccount-getdata']);

$user = new User();

if($registration) {
    $user->reg(
        $_POST['reg-name'], $_POST['reg-surname'], $_POST['reg-address'],
        $_POST['reg-phone'], $_POST['reg-login'], $_POST['reg-password']
    );
}

if($signin) $user->login($_POST['signin-login'], $_POST['signin-password']);
if($signout) $user->logout();

if (session_status() == PHP_SESSION_NONE) session_start();
if($myaccount or $getdata) $user_id = $_SESSION['user_id'];

if($myaccount){
    $user->update(
        $user_id, $_POST['myaccount-name'], $_POST['myaccount-surname'], $_POST['myaccount-address'],
        $_POST['myaccount-phone'], $_POST['myaccount-login'], $_POST['myaccount-password']
    );
}

if($getdata){
    $data = $user->getData($user_id);
    print( json_encode($data) );
}