<?php
require_once 'connect.php';
$categoryName = $_REQUEST['category'];
$req = "SELECT * FROM products WHERE productType='$categoryName'";
$query = mysqli_query($connect, $req);
if (mysqli_num_rows($query)){

    echo '<div class="center">';
    while ($lisProducts = mysqli_fetch_assoc($query)) {
        echo '<article class="prod prod-1">';
        echo '<div class="img-product">';
        echo '<img src="data:image;base64,' . $lisProducts['productPicture'] . '" alt="' . $lisProducts['nameProduct'] . '"></div>';
        echo '<div class="name">';
        echo '<h3>' . $lisProducts['nameProduct'] . '</h3>';
        echo '<i><small>' . $lisProducts['priceProduct'] . ' DH</small></i>';
        echo '</div>';
        echo '<div class="border">';
        echo '<button onclick="window.open(\'showProduct.php?idProduct=' . $lisProducts['idProduct'] . '&category=' . $categoryName . '\', \'_self\')">See details</button>';
        echo '</div>';
        echo "</article>";
    }
    echo '</div>';
}else{
    echo '<h1><center>There are currently no products in this category</center></h1>';
}
