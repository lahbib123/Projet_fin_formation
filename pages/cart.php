<?php
session_start();
if (!isset($_SESSION['connected'])) {
    header('location:login.php?alert=Warning_You must log in first_white_orange');
}elseif($_SESSION['role'] != 'user'){
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../php/head.php" ?>
    <style>
        table {
            margin: 0 auto;
            border-collapse: collapse;
            font-weight: bold;
            text-align: center;
        }

        table a {
            text-decoration: none;
            color: #202020;
        }

        table a:hover {
            text-decoration: underline;
        }

        th,
        td {
            border: 2px solid;
        }

        td,
        th {
            padding: 5px;
            font-size: large;
        }

        th {
            color: indigo;
        }

        .nb {
            width: 65px;
        }

        .cat {
            width: 180px;
        }

        .prod {
            width: 300px;
        }

        .pric,
        .btn {
            width: 100px;
        }

        tbody button {
            width: 80%;
            padding: 2px;
            margin: 2px;
            font-size: medium;
        }

        .quantity {
            width: 150px;
        }

        .ce {
            text-align: center;
        }

        .ce input {
            padding: 1px 10px;
            border-radius: 12px;

        }

        td:nth-child(odd),
        td:last-child {
            text-align: center;
        }

        .div {
            padding: 20px;
            text-align: center;
        }

        .div button {
            padding: 5px;
            width: 150px;
            font-size: larger;
            margin: auto 10px;
            cursor: pointer;
            color: #fff;
        }

        #valid {
            background-color: rgb(23, 135, 0);
        }

        #reset {
            background-color: rgb(255, 174, 0);
        }

        #valid:hover {
            background-color: rgb(75, 167, 56);
        }

        #reset:hover {
            background-color: rgb(241, 203, 119);
        }

        td span {
            padding: 0 6px
        }

        table #m,
        table #p {
            width: 25px;
        }

        table #m {
            margin-right: 10px;
        }

        table #p {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_GET['alert'])) {
        $alert =  explode('_', $_GET['alert']);
        $alertTitle = $alert[0];
        $alertMessage = $alert[1];
        $alertColor = $alert[2];
        $alertBGColor = $alert[3];
        echo "<div class='alert' style='color:$alertColor;background-color:$alertBGColor;'>";
        echo '<span class="closebtn"  id="close">&times;</span>';
        echo "<strong>$alertTitle</strong> : $alertMessage";
        echo '</div>';
    }
    ?>
    <?php require_once "../php/nav.php" ?>

    <header>
        <div class="header">
            <h1><?php echo 'Cart' ?></h1>
        </div>
    </header>

    <section>
        <table>
            <thead>
                <tr>
                    <th class="nb">Number</th>
                    <th class="cat">ِCategories</th>
                    <th class="prod">Products</th>
                    <th class="pric">Price</th>
                    <th class="quantity">Quantity</th>
                    <th class="btn">Remove</th>
                </tr>
            </thead>
            <?php
            if (isset($_COOKIE['myCart' . $_SESSION['ID']]) && (@strlen($_COOKIE['myCart' . $_SESSION['ID']]) > 2)) {
                $myCart = json_decode($_COOKIE['myCart' . $_SESSION['ID']]);
                $total = 0;
                $nb = 0;
                echo '<tbody>';
                foreach ($myCart as $prod) {

                    echo "<tr><td>" . ++$nb . "</td>";
                    echo "<td><a href='showProducts.php?category=" . $prod[1] . "'>" . $prod[1] . "<a></td>";
                    echo "<td><a href='showProduct.php?idProduct=" . $prod[0] . "&category=" . $prod[1] . "'>" . $prod[2] . "</a></td>";
                    echo "<td>" . $prod[3] . " DH</td>";
                    echo "<td><button id='m' onclick='window.open(\"../php/mQuntite.php?idProduct=" . $prod[0] . "\",\"_self\")'>-</button>" . $prod[4] . "<button id='p' onclick='window.open(\"../php/pQuntite.php?idProduct=" . $prod[0] . "\",\"_self\")'>+</button></td>";
                    echo "<td><button onclick='window.open(\"../php/removeProductFromCart.php?idProduct=" . $prod[0] . "\",\"_self\")'>Remove</button></td></tr>";
                    $total += ($prod[4] * $prod[3]);
                }
                echo '</tbody><tfoot><tr><th colspan="3">Total</th>';
                echo '<th colspan="3" id="total">' . $total . ' DH</th>';
                echo '</tr></tfoot>';
            } else {
            ?>
                <tbody id="cartEmpty">
                    <td colspan="6">Cart is empty</td>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Total</th>
                        <th colspan="3" id="total">00 DH</th>
                    </tr>
                </tfoot>
            <?php
            }
            ?>
        </table>
        <?php if (isset($nb)) { ?>
            <div class="div">
                <button onclick="window.open('../php/sendOrders.php', '_self')" id="valid">Send Orders</button>
                <button onclick="window.open('../php/emptyCart.php', '_self')" id="reset">Clear cart</button>
            </div>
        <?php } ?>
    </section>

    <?php require_once "../php/footer.php" ?>
    <script src="../javascript/script.js"></script>
</body>

</html>