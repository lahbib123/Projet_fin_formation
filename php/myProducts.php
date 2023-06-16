<?php

require_once 'connect.php';
$id = $_SESSION['ID'];
$req = "SELECT * FROM products WHERE productOwner=$id";
$query = mysqli_query($connect, $req);
echo '<table id="tbl"><tr><th>ID</th><th>Photo</th><th>Name</th><th>Category</th><th>Price</th><th>Quntity</th><th>Update</th><th>Remove</th></tr>';
if (mysqli_num_rows($query)) {
    $i = 1;
    while ($products = mysqli_fetch_assoc($query)) {
        echo "<tr><td>" . $i++ . "</td>";
        echo '<td><img src="data:image;base64,' . $products['productPicture'] . '" style="width: 80px"></td>';
        echo '<td>' . $products['nameProduct'] . '</td>';
        echo '<td>' . $products['productType'] . '</td>';
        echo '<td>' . $products['priceProduct'] . ' DH</td>';
        echo '<td>' . $products['quantity'] . '</td>';
        echo '<td><a href="../php/updateProduct.php?idProduct=' .  $products['idProduct'] . '">update</a></td>';
        echo '<td><a href="../php/deleteProduct.php?idProduct=' .  $products['idProduct'] . '">remove</a></td></tr>';
    }
} else {
?>
    <tr>
        <td colspan="8">
            <center><b> You don't have any products at the moment </b></center>
        </td>
    </tr>
<?php
}
echo '</table>';
