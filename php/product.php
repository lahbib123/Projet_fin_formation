<?php
require_once  'connect.php';
$idProduct = $_REQUEST['idProduct'];

$req = "SELECT * FROM products WHERE idProduct='$idProduct'";
$query = mysqli_query($connect, $req);
$product = mysqli_fetch_assoc($query);
$req2 = "SELECT fullName FROM users_accounts WHERE ID=" . $product['productOwner'];
$productOwner = mysqli_fetch_assoc(mysqli_query($connect, $req2))['fullName']
?>
<div class="shPr">
    <div class=".img">
        <img class="imgProduct" src="data:image;base64,<?php echo $product['productPicture'] ?>" alt="<?php echo $product['nameProduct'] ?>">
    </div>
    <table>
        <tr>
            <th>Product Name : <br><br></th>
            <td><?php echo $product['nameProduct'] ?><br><br></td>
        </tr>

        <tr>
            <th>Product Owner : <br><br></th>
            <td><?php echo $productOwner ?><br><br></td>
        </tr>
        <tr>
            <th>Price : <br><br></th>
            <td><?php echo $product['priceProduct'] ?> DH<br><br></td>
        </tr>
        <tr>
            <th>Added Date : <br><br></th>
            <td><?php echo substr($product['addedDate'], 0, 10) ?><br><br></td>
        </tr>
        <tr>
            <th>Description : <br><br></th>
            <td>
                <pre><?php echo $product['productDescription'] ?><br><br></pre>
            </td>
        </tr>
        <?php if ($product['productOwner'] != @$_SESSION['ID'] && @$_SESSION['role'] != 'admin') { ?>
            <tr>
                <th>Quantity : <br><br></th>

                <td>
                    <form action="../php/addToCart.php?idProduct=<?php echo $product['idProduct'] ?>&nameProduct=<?php echo $product['nameProduct'] ?>&priceProduct=<?php echo $product['priceProduct'] ?>&category=<?php echo $_REQUEST['category'] ?>" method="POST" autocomplete="off">
                        <input type="number" min="1" id="quntite" name="quntite" value="1" max="<?php echo $product['quantity'] ?>">
                        <input type="submit" class="addToCart" value="Add to cart">
                    </form><br><br>
                </td>

            </tr><?php } ?>
    </table>

</div>