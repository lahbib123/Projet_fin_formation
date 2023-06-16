<?php
require "connect.php";
session_start();
$email = $_SESSION['email'];
$password = $_SESSION['password'];

$CurrentPassword = $_REQUEST['CurrentPassword'];
$newPassword = $_REQUEST['newPassword'];
$retypeNewPassword = $_REQUEST['retypeNewPassword'];

if ($password !== $CurrentPassword) {
    header('location:../pages/account.php?accChoice=ChangePassword&alert=Wrong Password_The password you entered is incorrect_white_red');
}
elseif ($newPassword !== $retypeNewPassword)
{
    header('location:../pages/account.php?accChoice=ChangePassword&alert=Passwords Do Not Match_The new passwords do not match_white_red');
}
elseif (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/", $newPassword))
{
    header('location:../pages/account.php?accChoice=ChangePassword&alert=Invalid Password_You must enter the password consisting of uppercase and lowercase letters and numbers and the longest one must not be less than 8 characters_white_red');
}
else
{
    $req = "UPDATE `users_accounts` SET password='$newPassword' WHERE email='$email' AND password='$password'";
    $changePassword = mysqli_query($connect, $req);
    $_SESSION['password'] = $newPassword;
    header('location:../pages/account.php?accChoice=ChangePassword&alert=Password Changed Successfully_You can now use your new password_white_green');
}

?>