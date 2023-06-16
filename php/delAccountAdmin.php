<?php

session_start();

include 'connect.php';

$email = $_SESSION['email'];
$password = $_REQUEST['password'];
if ($password == $_SESSION['password'])
{
    $req = "DELETE FROM `admins_accounts` WHERE email='$email' AND password='$password' AND ID!=1";
    $req2 = "DELETE FROM `all_accounts` WHERE account='$email'";
    $delAcc = mysqli_query($connect, $req);
    mysqli_query($connect, $req2);
    if ($delAcc)
    {
        header("location:signOut.php?alert=Delete Account_Your account has been successfully deleted_white_green");
    }
}
else
{
    header("location:../pages/accountAdmin.php?accChoice=DelateMyAccount&alert=Mission Failed_The password you entered is incorrect_white_red");
}
?>
