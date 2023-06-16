<?php

session_start();
function getID($email){
    $req = "SELECT ID FROM users_accounts WHERE email='$email'";
    $id = mysqli_fetch_assoc(mysqli_query($GLOBALS['connect'], $req))['ID'];
    return $id;
}
require_once 'connect.php';
require_once 'emailExist.php';
$email = $_REQUEST['email'];

$req = "SELECT * FROM all_accounts WHERE account='$email'";
$query = mysqli_query($connect, $req);
$check = mysqli_fetch_assoc($query)["user_admin"];
$idUser =getID($email);
$a = explode('/', $_SERVER['HTTP_REFERER']);
$a = explode("?", end($a));
$page = current($a);
if (!emailExist($email)) {
    header("location:../pages/$page?accChoice=DelateUserAccount&alert=Failed Mission_This account does not exist_white_red");
} elseif ($check == 'admin') {
    header("location:../pages/$page?accChoice=DelateUserAccount&alert=Failed Mission_You cannot delete a admin_white_red");
} else {

    $req1 = "DELETE FROM `users_accounts` WHERE email='$email'";
    $req2 = "DELETE FROM `all_accounts` WHERE account='$email'";
    $req3 = "DELETE FROM `products` WHERE productOwner='$idUser'";
    $req4 = "DELETE FROM `orders` WHERE orderReceiver='$idUser' or orderSender='$idUser'";
    $query1 = mysqli_query($connect, $req1);
    $query2 = mysqli_query($connect, $req2);
    $query4 = mysqli_query($connect, $req3);
    $query3 = mysqli_query($connect, $req4);
    if ($query1 && $query2 && $query3 && $query4) {
        header("location:../pages/$page?accChoice=DelateUserAccount&alert=Successful Mission_The account has been deleted successfully_white_green");
    } else {
        header("location:../pages/$page?accChoice=DelateUserAccount&alert=Failed Mission_Please try again later_white_red");
    }
}
