<?php
session_start();
// s
@$myCart = json_decode($_COOKIE['myCart' . $_SESSION['ID']]);
@$count_cart = count($myCart); 
// e
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Let's_Shop , n°1 du gaming Maroc , Comparez et achetez votre PC gamer en livraison rapide à domicile ou en magasin.">
    <meta name="author" content="Bairis_Daoud">
    <title>Let's_Shop</title>
    <link rel="icon" type="image/png" href="logo/logo.png">
    <link rel="stylesheet" href="css/style.css">

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
        <div class="nav" color>
            <a href="index.php" id="drs">Let's_Shop</a>
            <ul>
                <li><a href="#products">Products</a></li>
                <li><a href="#contacts">Contacts</a></li>
                <li><a href="https://www.paypal.me/yassinedaoud64">Support</a></li>
                <li><a href="pages/about.php">About</a></li>
                
            </ul>
            <div class="float-right">
                <a <?php if (isset($_SESSION['connected']) && $_SESSION['role'] != 'user') {
                        echo 'style="visibility:hidden"';
                    } ?> href="pages/cart.php" id="cart"><img src="logo/logo.png" alt="logo" width="30" height="30"> <span style="color:red;font-size:27px"><sup><sup><sup><b><?php echo $count_cart == 0 ? "": $count_cart ?><b></sup></sup></sup></span></a></a>
                    
                <div class="dropdownACC">
                    <img onclick="myFunction()" class="dropbtnACC" src="logo/myAccount.png" />
                    <div id="myDropdown" class="dropdown-contentACC">
                        <?php
                        if (isset($_SESSION['connected'])) {
                            echo '<a href="pages/account.php">My Account</a>';
                            echo '<a href="php/signOut.php">Sign Out</a>';
                        } else {
                            echo '<a href="pages/login.php">Log In</a>';
                            echo '<a href="pages/singup.php">Sing Up</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <header>
        <div class="header">
            <h1>Welcome to the <span>Let's_Shop</span> website</h1><br>
            <p>The best online store in Morocco</p>
        </div>

        </div>
    </header>

    <section id="products">
        <div class="center">
            <?php require_once "php/categories.php" ?>
            <!--             <article id="art">
                <img src="aa.jpg" alt="a">
                <h3>picture</h3>
            </article> -->
        </div>
    </section>

    <footer id="contacts">
        <div class="padding">
            <h1 class="p1">For more information, please contact us</h1>
            <br>
            <a href="https://github.com/Driss25" target="_blank"><img src="logo/github.png" alt="Github" width="35" height="40"></a>
            <a href="https://www.facebook.com/" target="_blank"><img src="logo/facebook.png" alt="FaceBook" width="35" height="40"></a>
            <a href="https://www.instagram.com/" target="_blank"><img src="logo/instagram.png" alt="Instagram" width="35" height="40"></a>  
            <a href="https://www.linkedin.com/in/" target="_blank"><img src="logo/linkedin_1.png" alt="Linkedin"  width="35" height="40"></a><a href="https://twitter.com/" target="_blank"><img src="logo/twiter.png" alt="Twiter"  width="35" height="40"></a>
            <br><br>
            <button onclick="show_hide()"><img class="maps" src="logo/maps.png" alt="maps"  height="40"></button>
            <br>
            <br>
            <div class="iframe" id="maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d615.3972438125912!2d-10.056827877566766!3d28.98607293496539!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb503e104f6efbb%3A0x134321415d1dca6a!2sAS%20STORE!5e1!3m2!1sen!2sma!4v1641504695083!5m2!1sen!2sma" width="60%" height="400px" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <br><br>
            <p class="p2">Copyright &copy; Let's_Shop 2020-<?php echo date('Y') ?></p>
        </div>
    </footer>
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtnACC')) {
                var dropdowns = document.getElementsByClassName("dropdown-contentACC");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
        let a = true;

        function show_hide() {
            if (a) {
                document.getElementById("maps").style.display = "inline"
                return a = false
            } else {
                document.getElementById("maps").style.display = "none"
                return a = true
            }
        }

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
            hideAfter(3)
        }
    </script>
</body>

</html>