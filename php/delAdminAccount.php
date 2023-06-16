<?php

session_start();

require_once 'connect.php';
require_once 'emailExist.php';
$email = $_REQUEST['email'];

$req = "SELECT * FROM all_accounts WHERE account='$email'";
$query = mysqli_query($connect, $req);
$check = mysqli_fetch_assoc($query)["user_admin"];
$a = explode('/', $_SERVER['HTTP_REFERER']);
$a = explode("?", end($a));
$page = current($a);
if (!emailExist($email)) {
    header("location:../pages/accountStoreOwner.php?accChoice=DelateAdminAccount&alert=Failed Mission_This account does not exist_white_red");
}else {

    $req = "DELETE FROM `admins_accounts` WHERE email='$email' AND ID!=1";
    $req2 = "DELETE FROM `all_accounts` WHERE account='$email'";
    $query1 = mysqli_query($connect, $req);
    $query2 = mysqli_query($connect, $req2);
    if ($query1 && $query2) {
        header("location:../pages/accountStoreOwner.php?accChoice=DelateAdminAccount&alert=Successful Mission_The account has been deleted successfully_white_green");
    } else {
        header("location:../pages/accountStoreOwner.php?accChoice=DelateAdminAccount&alert=Failed Mission_Please try again later_white_red");
    }
}
