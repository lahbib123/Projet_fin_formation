<?php
session_start();
$myCart = json_decode($_COOKIE['myCart'. $_SESSION['ID']]);
foreach ($myCart as $prod) {
    if ($prod[0] === (int)$_REQUEST['idProduct']) {
        $delProd = $prod;
        break;
    }
}
if (isset($delProd)){
    unset($myCart[array_search($delProd, $myCart)]);
    $myCart = json_encode($myCart);
    setcookie('myCart'. $_SESSION['ID'], $myCart, time() + (7 * 24 * 60 * 60), '/');
}


header('location:../pages/cart.php?alert=Successful Mission_Product deleted from cart successful_white_green');
?>