<?php
require_once 'connect.php';

session_start();
$email = strtolower($_REQUEST['email']);
$password = $_REQUEST['password'];


if ($_REQUEST['role'] == 'user') {


    $req = "SELECT * FROM `users_accounts` WHERE email='$email' and password='$password'";
    $tryConnect = mysqli_query($connect, $req);

    if (mysqli_num_rows($tryConnect)) {
        $data = mysqli_fetch_assoc($tryConnect);

        $_SESSION['connected'] = true;

        $_SESSION['ID'] = $data['ID'];
        $_SESSION['fullName'] = $data['fullName'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['phone'] = $data['phone'];
        $_SESSION['DOB'] = $data['DOB'];
        $_SESSION['gender'] = $data['gender'];
        $_SESSION['city'] = $data['city'];
        $_SESSION['address'] = $data['address'];
        $_SESSION['cart'] = $data['cart'];
        $_SESSION['role'] = $_REQUEST['role'];
        header("location:../pages/account.php");
    } else {
        header('location:../pages/login.php?alert=Account not found_This account is not recognized, if you do not have an account please register on the site_white_red');
    }
} elseif ($_REQUEST['role'] == 'admin') {
    $req = "SELECT * FROM `admins_accounts` WHERE email='$email' and password='$password'";
    $tryConnect = mysqli_query($connect, $req);

    if (mysqli_num_rows($tryConnect)) {
        $data = mysqli_fetch_assoc($tryConnect);
        if ($data['ID'] == 1) {
            $_SESSION['role'] = 'drs';
            $_SESSION['connected'] = true;
            header('location:../pages/accountStoreOwner.php');
        } else {

            $_SESSION['connected'] = true;

            $_SESSION['ID'] = $data['ID'];
            $_SESSION['fullName'] = $data['fullName'];
            $_SESSION['email'] = $data['email'];
            $_SESSION['password'] = $data['password'];
            $_SESSION['phone'] = $data['phone'];
            $_SESSION['DOB'] = $data['DOB'];
            $_SESSION['gender'] = $data['gender'];
            $_SESSION['city'] = $data['city'];
            $_SESSION['address'] = $data['address'];
            $_SESSION['role'] = $_REQUEST['role'];
            header("location:../pages/accountAdmin.php");
        }
    } else {
        header('location:../pages/login.php?alert=Account not found_This account is not recognized, if you do not have an account please register on the site_white_red');
    }
}
