<?php
require_once 'connect.php';
define('MB', 1048576);
$categoryName = $_REQUEST['categoryName'];
$a = explode('/', $_SERVER['HTTP_REFERER']);
$a = explode("?", end($a));
$page = current($a);

if (!preg_match("/[\w|\s|\d]+/", $categoryName)) {
    header("location:../pages/$page?accChoice=AddCategorie&alert=Invalide Catigory Name_please choose a valid category Name_white_red&categoryName=$categoryName");
} elseif (substr($_FILES['categoriesPicture']['type'], 0, 5) != 'image') {
    header("location:../pages/$page?accChoice=AddCategorie&alert=Please Choose A Valid Picture_Failed to load image_white_red&categoryName=$categoryName");
} elseif ($_FILES['categoriesPicture']['size'] > 3 * MB) {
    header("location:../pages/$page?accChoice=AddCategorie&alert=Please choose an image less than 3MB in size_Failed to load image_white_red&categoryName=$categoryName");
} else {
    $categoriesPicture = base64_encode(file_get_contents($_FILES['categoriesPicture']['tmp_name']));
    $req = "INSERT INTO product_categories (`categoryName`,`categoriesPicture`) VALUES ('$categoryName','$categoriesPicture')";
    $query = mysqli_query($connect, $req);
    if ($query) {
        header("location:../pages/$page?accChoice=AddCategorie&alert=Mission Done_Category add successful_white_green");
    }
}
