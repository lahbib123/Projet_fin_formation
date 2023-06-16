<?php
session_start();
require_once "connect.php";
function getIdOwner($id)
{
    $req = "SELECT productOwner FROM products WHERE idProduct='$id'";
    $productOwner = mysqli_fetch_assoc(mysqli_query($GLOBALS['connect'], $req))['productOwner'];
    return $productOwner;
}

$myCart = json_decode($_COOKIE['myCart'. $_SESSION['ID']]);
foreach ($myCart as $prod) {

    $idProduct = $prod[0];
    $orderSender = $_SESSION['ID'];
    $orderReceiver = getIdOwner($idProduct);
    $quntite = $prod[4];

    
    $req = "INSERT INTO orders (`orderSender`,`orderReceiver`,`idProduct`,`quntite`) VALUES ('$orderSender','$orderReceiver','$idProduct','$quntite')";
    mysqli_query($connect, $req);
}

header('location:emptyCart.php?alert=Orders have been sent successfully__white_green');
