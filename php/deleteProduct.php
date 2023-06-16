<?php
require_once 'connect.php';
$idProduct = $_REQUEST['idProduct'];
$req1 = "DELETE FROM products WHERE idProduct='$idProduct'";
$query = mysqli_query($connect, $req1);

$req2 = "DELETE FROM orders WHERE idProduct='$idProduct'";
mysqli_query($connect, $req2);
header('location:../pages/account.php?accChoice=ShowMyProducts&alert=Mission Successful_The product has been deleted successfully_white_green')
?>