<?php
require_once 'connect.php';
session_start();
$idProduct = $_REQUEST['idProduct'];
if (isset($_REQUEST['update'])) {
    $nameProduct = $_REQUEST['nameProduct'];
    $productType = $_REQUEST['productType'];
    $priceProduct = $_REQUEST['priceProduct'];
    $quantity = $_REQUEST['quantity'];
    $productDescription = $_REQUEST['productDescription'];

    $req1 = "UPDATE products SET nameProduct='$nameProduct', productType='$productType', priceProduct='$priceProduct', quantity='$quantity', productDescription='$productDescription'";
    if ($_FILES['productPicture']['size']) {
        $req1 .= ", productPicture='" . base64_encode(file_get_contents($_FILES['productPicture']['tmp_name'])) . "' WHERE idProduct='$idProduct'";
    } else {
        $req1 .= " WHERE idProduct='$idProduct'";
    }
    mysqli_query($connect, $req1);
    header('location:../pages/account.php?accChoice=ShowMyProducts&alert=Successful Mission_Product update successful_white_green');
} else {
    $req2 = "SELECT * FROM products WHERE idProduct=$idProduct";
    $product = mysqli_fetch_assoc(mysqli_query($connect, $req2));
}

// s
@$myCart = json_decode($_COOKIE['myCart' . $_SESSION['ID']]);
@$count_cart = count($myCart); 
// e

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='description' content='Bar Gaming , n°1 du gaming Maroc , Comparez et achetez votre PC gamer en livraison rapide à domicile ou en magasin.'>
    <meta name='author' content='BAirisDaoud'>
    <title>Bar Gaming</title>
    <link rel='icon' type='image/png' href='../logo/logo.png'>
    <link rel='stylesheet' href='../css/pageStyle.css'>
    <link rel="stylesheet" href="../css/styleL_S.css">
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
    <nav>
        <div class='nav'>
            <a href='../index.php' id='drs'>Let's_Shop</a>
            <ul>
                <li><a href='../index.php#products'>Products</a></li>
                <li><a href='#contacts'>Contacts</a></li>
                <li><a href='https://paypal.me/drissraiss?country.x=MA&locale.x=en_US'>Support</a></li>
                <li><a href='pages/about.html'>About</a></li>
                <li>
                    <div class='dropdown'>
                        <span class='dropbtn'>Language ▼</span>
                        <div class='dropdown-content'>
                            <span id='en'>English</span>
                            <span id='fr'>French</span>
                            <span id='ar'>Arabic</span>
                        </div>
                    </div>
                </li>
                <li>
                    <div class='dropdown'>
                        <span class='dropbtn'>Mode ▼</span>
                        <div class='dropdown-content'>
                            <span id='auto'>Auto mode</span>
                            <span id='light'>Normal Mode</span>
                            <span id='dark'>Night mode</span>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="float-right">
                <a href="cart.php" id="cart"><img src="logo/logo.png" alt="Github" width="30" height="30"><span style="color:red;font-size:27px"><sup><sup><sup><b><?php echo $count_cart == 0 ? "": $count_cart ?><b></sup></sup></sup></span></a></a>
                <div class="dropdownACC">
                    <img onclick="myFunction()" class="dropbtnACC" src="../logo/myAccount.png" />
                    <div id="myDropdown" class="dropdown-contentACC">
                        <?php
                        if (isset($_SESSION['connected'])) {
                            echo '<a href="account.php">My Account</a>';
                            echo '<a href="../php/signOut.php">Sign Out</a>';
                        } else {
                            echo '<a href="login.php">Log In</a>';
                            echo '<a href="singup.php">Sing Up</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <header>
        <div class="header">
            <h1><?php echo 'Update Product' ?></h1>
        </div>
    </header>

    <section>
        <div class="center">
            <table class="changePassword" style="margin: auto;">
                <h2 class="h4" style="margin-bottom: 30px;">Add Product</h2>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                    <tr>
                        <th><label for="nameProduct">Name Product</label></th>
                        <td><input type="text" class="inpt" style="width: 400px;" id="nameProduct" name="nameProduct" <?php echo "value='" . $product['nameProduct'] . "'" ?>></td>
                        <input type="hidden" class="inpt" style="width: 400px;" name="idProduct" value="<?php echo $product['idProduct'] ?>">
                    </tr>
                    <tr>
                        <th><label for="productType">Product Type</label></th>
                        <td id="availableCategories">
                            <?php require_once "availableCategories.php" ?>
                        </td>
                    </tr>
                    <tr>
                        <th><label for="priceProduct">Price Product</label></th>
                        <td><input type="number" class="inpt" style="width: 400px;" min="1" name="priceProduct" id="priceProduct" <?php echo "value='" . $product['priceProduct'] . "'" ?>></td>
                    </tr>
                    <tr>
                        <th><label for="quantity">Quantity</label></th>
                        <td><input type="number" class="inpt" style="width: 400px;" name="quantity" id="quantity" min="1" <?php echo "value='" . $product['quantity'] . "'" ?>></td>
                    </tr>
                    <tr>
                        <th><label for="productPicture">Product Picture</label></th>
                        <td><input type="file" style="padding: .6em;font-size: larger;background-color: #f9f9f9;width: 400px;" name="productPicture" id="productPicture" accept="image/png, image/gif, image/jpeg"></td>
                    </tr>
                    <tr>
                        <th><label for="productDescription">Product Description</label></th>
                        <td><textarea name="productDescription" class="textarea" style="resize: none;width: 418px;" id="productDescription" cols="30" rows="10"><?php echo $product['productDescription'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input style="width: 100%;padding: 10px 0;font-size: x-large;" type="submit" class="sb" name="update" value="Update product">
                            <br><br>
                            <a href="../pages/account.php?accChoice=ShowMyProducts" style="text-decoration: none;">cancel update</a>
                        </td>
                    </tr>
                </form>
            </table>

        </div>
    </section>

    <footer id='contacts'>
        <div class='padding'>
            <p class='p1'>For more information, please contact us</p>
            <br>
            <a href='https://github.com/Driss25' target='_blank'><img src='../logo/github.png' alt='Github'></a>
            <a href='https://www.facebook.com/mohamad.zaze.12' target='_blank'><img src='../logo/facebook.png' alt='FaceBook'></a>
            <a href='https://www.instagram.com/drissrays' target='_blank'><img src='../logo/instagram.png' alt='Instagram'></a>
            <a href='https://www.linkedin.com/in/driss-raiss-8aa83922a' target='_blank'><img src='../logo/Linkedin.png' alt='Linkedin'></a>
            <a href='https://twitter.com/drissraiss99' target='_blank'><img src='../logo/twiter.png' alt='Twiter'></a>
            <br><br>
            <button onclick='show_hide()'><img class='maps' src='../logo/maps.png' alt='maps'></button>
            <br>
            <br>
            <div class='iframe' id='maps'>
                <iframe src='https://www.google.com/maps/embed?pb = !1m18!1m12!1m3!1d615.3972438125912!2d-10.056827877566766!3d28.98607293496539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb503e104f6efbb%3A0x134321415d1dca6a!2sAS%20STORE!5e1!3m2!1sen!2sma!4v1641504695083!5m2!1sen!2sma' width='60%' height='400px' allowfullscreen='' loading='lazy'></iframe>
            </div>
            <br><br>
            <p class='p2'>Copyright To DRS Gaming &copy; 2020-<?php echo date('Y') ?></p>
        </div>
    </footer>
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        // alert
        function hide() {
            document.querySelector('.alert').style.display = 'none';
            clearTimeout(ms)
        }
        if (document.getElementById('close') != null) {
            document.getElementById('close').onclick = hide
        }
        let ms;

        function hideAfter(s) {
            ms = setTimeout(() => hide(), s * 1000)
        }
        if (document.querySelector('.alert') != null) {
            hideAfter(5)
        }
        // end alert
        document.querySelector('#availableCategories select').value = "<?php echo $product['productType'] ?>"
    </script>
</body>

</html>