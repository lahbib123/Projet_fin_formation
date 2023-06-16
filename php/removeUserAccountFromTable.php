<?php
require_once "connect.php";
function getID($email)
{
    $req = "SELECT ID FROM users_accounts WHERE email='$email'";
    $id = mysqli_fetch_assoc(mysqli_query($GLOBALS['connect'], $req))['ID'];
    return $id;
}
$id = explode('_', $_REQUEST['id_email'])[0];
$email = explode('_', $_REQUEST['id_email'])[1];
$idUser = getID($email);
$req1 = "DELETE FROM `users_accounts` WHERE ID='$id'";
$req2 = "DELETE FROM `all_accounts` WHERE account='$email'";
$req3 = "DELETE FROM `products` WHERE productOwner='$idUser'";
$req4 = "DELETE FROM `orders` WHERE orderReceiver='$idUser' or orderSender='$idUser'";
$query1 = mysqli_query($connect, $req1);
$query2 = mysqli_query($connect, $req2);
$query3 = mysqli_query($connect, $req3);
$query4 = mysqli_query($connect, $req4);
if ($query1 && $query2 && $query3 && $query4) {
    header("location:../pages/accountStoreOwner.php?accChoice=ShowAllUsersAccounts&alert=Successful Mission_The account has been deleted successfully_white_green");
} else {
    header("location:../pages/accountStoreOwner.php?accChoice=ShowAllUsersAccounts&alert=Failed Mission_Please try again later_white_red");
}
