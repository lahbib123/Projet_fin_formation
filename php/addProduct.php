<?php

require_once "connect.php";
session_start();


$productOwner = $_SESSION['ID'];

$nameProduct = $_REQUEST['nameProduct'];
$productType = $_REQUEST['productType'];
$priceProduct = $_REQUEST['priceProduct'];
$quantity = $_REQUEST['quantity'];
$productDescription = $_REQUEST['productDescription'];

define('MB', 1048576);

if (!preg_match("/^[\w|\s|\d]+$/", $nameProduct)) {
    $retry = 1;
    $error = 'nameProduct';
    $alert = 'Invalid Product Name_Please choose a suitable name for the product_white_red';
} elseif (!preg_match("/^\d+$/", $priceProduct) || ((int)$priceProduct <= 0)) {
    $retry = 1;
    $error = 'priceProduct';
    $alert = 'Invalid Price_Please choose a suitable price_white_red';
} elseif (!preg_match("/^\d+$/", $quantity) || ((int)$quantity <= 0)) {
    $retry = 1;
    $error = 'quantity';
    $alert = 'Invalid Quantity_Please choose a suitable Quantity_white_red';
} elseif (substr($_FILES['productPicture']['type'], 0, 5) != 'image') {
    $retry = 1;
    $error = 'productPicture';
    $alert = 'Please Choose A Valid Picture_Failed to load image_white_red';
} elseif ($_FILES['productPicture']['size'] > 3 * MB) {
    $retry = 1;
    $error = 'productPicture';
    $alert = 'Please choose an image less than 3MB in size_Failed to load image_white_red';
} elseif (strlen($productDescription) < 10) {
    $retry = 1;
    $error = 'productDescription';
    $alert = 'Invalid Description_Please fill in this field, it is required_white_red';
} else {
    $retry = 0;
    $productPicture = base64_encode(file_get_contents($_FILES['productPicture']['tmp_name']));
    $req = "INSERT INTO `products` (`productOwner`,`nameProduct`,`productType`,`priceProduct`,`quantity`,`productPicture`,`productDescription`)
        VALUES ('$productOwner','$nameProduct','$productType','$priceProduct','$quantity','$productPicture','$productDescription')";

    if ($connect->query($req)) {
        header('location:../pages/account.php?accChoice=AddProduct&alert=Product Added Successfully_You can now receive orders for this product_white_green');
    } else {
        header('location:../pages/account.php?accChoice=AddProduct&alert=Failed To Add Product_Please come back later_white_red');
    }
}
if ($retry) {
    header("location:../pages/account.php?accChoice=AddProduct&retry=$retry&error=$error&alert=$alert&nameProduct=$nameProduct&productType=$productType&priceProduct=$priceProduct&quantity=$quantity&productDescription=$productDescription");
}
