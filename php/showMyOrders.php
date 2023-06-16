<?php
require_once "connect.php";
function getNamePhoneSender($id)
{
    $req = "SELECT fullName, phone FROM users_accounts WHERE ID='$id'";
    $array = mysqli_fetch_assoc(mysqli_query($GLOBALS['connect'], $req));
    echo '<td>'.$array['fullName'].'</td>';
    echo '<td>'.$array['phone'].'</td>';
}
function getNameProduct($product)
{
    $req = "SELECT nameProduct FROM products WHERE idProduct='$product'";
    $nameProduct = mysqli_fetch_assoc(mysqli_query($GLOBALS['connect'], $req))['nameProduct'];
    return $nameProduct;
}
function getTotal($product, $qauntity)
{
    $req = "SELECT priceProduct FROM products WHERE idProduct='$product'";
    $priceProduct = mysqli_fetch_assoc(mysqli_query($GLOBALS['connect'], $req))['priceProduct'];
    return $priceProduct * $qauntity;
}

$req = "SELECT * FROM orders WHERE orderReceiver='" . $_SESSION['ID'] . "'";
$query = mysqli_query($connect, $req);
?>
<table id="tbl">
    <thead>
        <tr>
            <th>NB</th>
            <th>Name Customer</th>
            <th>Phone Customer</th>
            <th>Products</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Order Date</th>
            <th>Remove Order</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nb = 0;
        if (mysqli_num_rows($query)) {
            while ($order = mysqli_fetch_assoc($query)) {
                echo '<tr>';
                echo '<td>' . ++$nb . '</td>';
                getNamePhoneSender($order['orderSender']);
                echo '<td>' . getNameProduct($order['idProduct']) . '</td>';
                echo '<td>' . $order['quntite'] . '</td>';
                echo '<td>' . getTotal($order['idProduct'], $order['quntite']) . ' DH</td>';
                echo '<td>' . $order['orderDate'] . '</td>';
                echo '<td><a href="../php/removeOrder.php?idOrder=' . $order['id'] . '">Remove</a></td>';
                echo '</tr>';
            }
        } else { ?>
            <tr>
                <td colspan="8"> <center><b>There are no orders at the moment</b><center> </td>
            </tr>
        <?php }
        ?>
    </tbody>
    <tfoot>

    </tfoot>
</table>