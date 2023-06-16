<?php
session_start();
if (!isset($_SESSION['connected'])) {
    header('location:../pages/login.php?alert=Warning_You must log in first_white_orange');
} else {

    $idProduct = $_REQUEST['idProduct'];
    $nameProduct = $_REQUEST['nameProduct'];
    $priceProduct = $_REQUEST['priceProduct'];
    $quntite = $_REQUEST['quntite'];
    $category = $_REQUEST['category'];
    setcookie('test', '', time() + 60, '/');
    if (!count($_COOKIE)) {
        header("location:../pages/showProduct.php?idProduct=$idProduct&category=$category&alert=Warning_You must first allow the use of cookies_white_orange");
    } else {
        $myCart = json_decode($_COOKIE['myCart' . $_SESSION['ID']]);
        foreach ($myCart as $prod) {
            if ($prod[0] === (int)$idProduct) {
                $exsist = $prod;
                break;
            }
        }
        if (isset($exsist)) {
            $myCart[array_search($exsist, $myCart)][4] = $myCart[array_search($exsist, $myCart)][4] + (int)$quntite;
        } else {
            array_push($myCart, array((int)$idProduct, $category, $nameProduct, (int)$priceProduct, (int)$quntite));
        }
        $myCart = json_encode($myCart);
        setcookie('myCart' . $_SESSION['ID'], $myCart, time() + (7 * 24 * 60 * 60), '/');
        header("location:../pages/showProduct.php?idProduct=$idProduct&category=$category&alert=Product added to cart__white_green");
    }
}
