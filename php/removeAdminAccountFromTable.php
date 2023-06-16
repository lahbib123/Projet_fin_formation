<?php
require_once "connect.php";
$id = explode('_', $_REQUEST['id_email'])[0];
$email = explode('_', $_REQUEST['id_email'])[1];

$req = "DELETE FROM `admins_accounts` WHERE ID='$id'";
$req2 = "DELETE FROM `all_accounts` WHERE account='$email'";
$query1 = mysqli_query($connect, $req);
$query2 = mysqli_query($connect, $req2);

if ($query1 && $query2) {
    header("location:../pages/accountStoreOwner.php?accChoice=ShowAllAdminsAccounts&alert=Successful Mission_The account has been deleted successfully_white_green");
} else {
    header("location:../pages/accountStoreOwner.php?accChoice=ShowAllAdminsAccounts&alert=Failed Mission_Please try again later_white_red");
}
