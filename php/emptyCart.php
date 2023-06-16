<?php
session_start();
setcookie('myCart'. $_SESSION['ID'], $myCart, time() - (7 * 24 * 60 * 60), '/');
$alert= $_REQUEST['alert'] ?? "Successful Mission_Cart is emptied_white_green";
header("location:../pages/cart.php?alert=$alert");
