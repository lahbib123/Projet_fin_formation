<?php

session_start();

require_once 'connect.php';

function getID($email)
{
    $req = "SELECT ID FROM users_accounts WHERE email='$email'";
    $id = mysqli_fetch_assoc(mysqli_query($GLOBALS['connect'], $req))['ID'];
    return $id;
}

$email = $_SESSION['email'];
$password = $_REQUEST['password'];
$idUser = getID($email);
if ($password == $_SESSION['password']) {
    $req1 = "DELETE FROM `users_accounts` WHERE email='$email' and password='$password'";
    $req2 = "DELETE FROM `all_accounts` WHERE account='$email'";
    $req3 = "DELETE FROM `products` WHERE productOwner='$idUser'";
    $req4 = "DELETE FROM `orders` WHERE orderReceiver='$idUser' or orderSender='$idUser'";
    $query1 = mysqli_query($connect, $req1);
    $query2 = mysqli_query($connect, $req2);
    $query3 = mysqli_query($connect, $req3);
    $query4 = mysqli_query($connect, $req4);
    if ($query1 && $query2 && $query3 && $query4) {
        header("location:signOut.php?alert=Delete Account_Your account has been successfully deleted_white_green");
    }else {
        header("location:../pages/account.php?accChoice=DelateMyAccount?&alert=Failed Mission_Please try again later_white_red");
    }
} else {
    header("location:../pages/account.php?accChoice=DelateMyAccount&alert=Mission Failed_The password you entered is incorrect_white_red");
}
