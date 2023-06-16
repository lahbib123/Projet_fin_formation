<?php
session_start();
$myCart = json_decode($_COOKIE['myCart'. $_SESSION['ID']]);
foreach ($myCart as $prod) {
    if ($prod[0] === (int)$_REQUEST['idProduct']) {
        $exsist = $prod;
        break;
    }
}
if (isset($exsist)){
    $myCart[array_search($exsist, $myCart)][4] = $myCart[array_search($exsist, $myCart)][4] + 1;
    $myCart = json_encode($myCart);
    setcookie('myCart'. $_SESSION['ID'], $myCart, time() + (7 * 24 * 60 * 60), '/');
}

header("location:../pages/cart.php");

?>