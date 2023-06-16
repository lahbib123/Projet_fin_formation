<?php
require_once 'connect.php';

$req = 'SELECT `categoryName` FROM `product_categories`';
$query = mysqli_query($connect, $req);
echo '<select name="productType" style="width:426px;padding:.6em;font-size:larger;background-color: #f9f9f9;border: 1px solid #e5e5e5;" id="productType">';
while ($categories = mysqli_fetch_assoc($query))
{
    echo "<option value='". $categories['categoryName'] ."'>" . $categories['categoryName'] . '</option>';
}
echo '</select>'

?>
