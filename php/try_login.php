<?php
require_once 'connect.php';
require_once 'emailExist.php';



$email = strtolower($_REQUEST['email']);
$password = $_REQUEST['password'];
if (!emailExist($email)) {
    header('location:../pages/login.php?alert=Account not found_This account is not recognized, if you do not have an account please register on the site_white_red');
}

$req = "SELECT * FROM all_accounts WHERE account='$email'";
$query = mysqli_query($connect, $req);

if (mysqli_num_rows($query) > 0) {
    $check = mysqli_fetch_assoc($query)["user_admin"];
    if ($check == 'user') {
        header("location:connectACC.php?role=user&email=$email&password=$password");
    } elseif ($check == 'admin') {
        header("location:connectACC.php?role=admin&email=$email&password=$password");
    }
} else {
    header('location:../pages/login.php?alert=Account not found_This account is not recognized, if you do not have an account please register on the site_white_red');
}