<?php
    @$myCart = json_decode($_COOKIE['myCart' . $_SESSION['ID']]);
    @$count_cart = count($myCart);

?>
<nav>
    <div class='nav'>
        <a href='../index.php' id='drs'>Let's_Shop</a>
        <ul>
            <li><a href='../index.php#products'>Products</a></li>
            <li><a href='#contacts'>Contacts</a></li>
            <li><a href='https://paypal.me/drissraiss?country.x=MA&locale.x=en_US'>Support</a></li>
            <li><a href='about.php'>About</a></li>
            
        </ul>
        <div class="float-right">
            <a <?php if (isset($_SESSION['connected']) && $_SESSION['role'] == 'admin') {
                    echo 'style="visibility:hidden"';
                } ?> href="cart.php" id="cart"><img src="../logo/logo.png" alt="logo" width="30" height="30"> <span style="color:red;font-size:27px"><sup><sup><sup><b><?php echo $count_cart == 0 ? "": $count_cart ?><b></sup></sup></sup></span></a>
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
