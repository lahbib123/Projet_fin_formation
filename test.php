<?php 

$myCart = json_decode($_COOKIE['myCart' . $_SESSION['ID']]);

echo $myCart;
?>