<?php
session_start();

require_once 'connect.php';

$retry =  $_REQUEST['retry'] ?? 0;
$error =  $_REQUEST['error'] ?? 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fullName = strtolower($_REQUEST['fullName']);
    $phone = $_REQUEST['phone'];
    $day = $_REQUEST['day'];
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
    $DOB =  $year . "-" . $month . "-" . $day;
    $gender = $_REQUEST['gender'];
    $city = ucfirst($_REQUEST['city']);
    $address = ucfirst($_REQUEST['address']);

    if (strlen($fullName) < 6 || !preg_match("/^[aA-zZ]+[\s_][aA-zZ]+$/", $fullName)) {

        $retry = 1;
        $error = 'fullName';
        $alert = "Invalid name_You must enter your correct full name and it should not be less than 6 characters_white_red";
    } elseif (!preg_match("/^0[567][0-9]{8}$/", $phone)) {

        $retry = 1;
        $error = 'phone';
        $alert = "Invalid Phone Number_The phone number you entered is invalid Please enter a valid phone number_white_red";
    } elseif (strlen($city) < 3) {

        $retry = 1;
        $error = 'city';
        $alert = "Invalid City_Please enter a valid city_white_red";
    } elseif (strlen($address) < 3) {
        $retry = 1;
        $error = 'address';
        $alert = "Invalid Address_Please enter a valid address_white_red";
    } elseif (!is_numeric($day) || ((int)$day < 1 || (int)$day > 31)) {
        $retry = 1;
        $error = 'day';
        $alert = "Invalid day_Please enter a valid day_white_red";
    } elseif (!is_numeric($month) || ((int)$month < 1 || (int)$month > 12)) {
        $retry = 1;
        $error = 'month';
        $alert = "Invalid Month_Please enter a valid month_white_red";
    } elseif (!is_numeric($year) || ((int)$year < (int)date("Y", strtotime('-100 year')) || (int)$year > (int)date("Y"))) {
        $retry = 1;
        $error = 'year';
        $alert = "Invalid Year_Please enter a valid year_white_red";
    } elseif ((int)$year > (int)date("Y", strtotime('-18 year'))) {
        $retry = 1;
        $error = 'year';
        $alert = "Registration Error_You cannot register on the site and you are not more than 18 years old_white_red";
    } elseif (!isset($gender)) {
        $retry = 1;
        $error = 'gender';
        $alert = "Gender Error_Please select your gender_white_red";
    } else {
        $DOB = $year . '-' . $month . '-' . $day;
        $req =
            "UPDATE 
            `admins_accounts` 
        SET 
            fullName='$fullName', 
            phone='$phone', 
            DOB='$DOB', 
            gender='$gender', 
            city='$city', 
            address='$address' 
        WHERE
            email='".$_SESSION['email']."' 
            ";
        $changeData = mysqli_query($connect, $req);

        $_SESSION['fullName'] = $fullName;
        $_SESSION['phone'] = $phone;
        $_SESSION['DOB'] = $DOB;
        $_SESSION['gender'] = $gender;
        $_SESSION['city'] = $city;
        $_SESSION['address'] = $address;

        if ($changeData) {
            header('location:../pages/account.php?accChoice=MyAccount&alert=Changes Saved Successfully_Changes have been saved successfully_white_green');
        } else {
        }
    }

    if ($retry) {
        header('location:' . $_SERVER['PHP_SELF'] . "?retry=$retry&error=$error&alert=$alert&fullName=$fullName&phone=$phone&city=$city&address=$address&day=$day&month=$month&year=$year&gender=$gender");
    }
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
    <meta name='author' content='BairisDaoud'>
    <title>Bar Gaming</title>
    <link rel='icon' type='image/png' href='../logo/logo.png'>
    <link rel="stylesheet" href="../css/styleL_S.css">
    <link rel='stylesheet' href='../css/pageStyle.css'>
    <link rel="stylesheet" href="../css/styleForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #cnl {
            text-align: center;
            display: block;
            text-decoration: none;
            font-size: larger;
            color: black;
        }
        #cnl:hover {
            text-decoration: underline;
            color: blue;
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
    <nav>
    <div class='nav'>
        <a href='../index.php' id='drs'>Let's_Shop</a>
        <ul>
            <li><a href='../index.php#products'>Products</a></li>
            <li><a href='#contacts'>Contacts</a></li>
            <li><a href='https://paypal.me/drissraiss?country.x=MA&locale.x=en_US'>Support</a></li>
            <li><a href='../pages/about.php'>About</a></li>
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
            <a <?php if (isset($_SESSION['connected']) && $_SESSION['role'] != 'user') {
                    echo 'style="visibility:hidden"';
                } ?> href="../pages/cart.php" id="cart"><img src="logo/logo.png" alt="Github" width="30" height="30"> <span style="color:red;font-size:27px"><sup><sup><sup><b><?php echo $count_cart == 0 ? "": $count_cart ?><b></sup></sup></sup></span></a></a>
            <div class="dropdownACC">
                <img onclick="myFunction()" class="dropbtnACC" src="../logo/myAccount.png" />
                <div id="myDropdown" class="dropdown-contentACC">
                    <?php
                    if (isset($_SESSION['connected'])) {
                        echo '<a href="../pages/account.php">My Account</a>';
                        echo '<a href="signOut.php">Sign Out</a>';
                    } else {
                        echo '<a href="../pages/login.php">Log In</a>';
                        echo '<a href="../pages/singup.php">Sing Up</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</nav>

    <header>
        <div class="header">
            <h1><?php echo 'Edit account' ?></h1>
        </div>
    </header>
    <section>

        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                <div class="row">
                    <h4>Account</h4>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Full Name" name="fullName" <?php
                                                                                    if ($retry) {
                                                                                        echo "value='" . $_GET['fullName'] . "'";
                                                                                    } else {
                                                                                        echo "value='" . $_SESSION['fullName'] . "'";
                                                                                    }

                                                                                    if ($error == 'fullName') {
                                                                                        echo "style='color: red; border: red solid 1px'";
                                                                                    }
                                                                                    ?> />
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Email Adress" name="email" style="cursor: not-allowed;" disabled <?php echo "value='" . $_SESSION['email'] . "'" ?> />
                        <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Phone number" name="phone" <?php
                                                                                    if ($retry) {
                                                                                        echo "value='" . $_GET['phone'] . "'";
                                                                                    } else {
                                                                                        echo "value='" . $_SESSION['phone'] . "'";
                                                                                    }

                                                                                    if ($error == 'phone') {
                                                                                        echo "style='color: red; border: red solid 1px'";
                                                                                    }
                                                                                    ?> />
                        <div class="input-icon"><i class="fa fa-phone"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="City" name="city" <?php
                                                                            if ($retry) {
                                                                                echo "value='" . $_GET['city'] . "'";
                                                                            } else {
                                                                                echo "value='" . $_SESSION['city'] . "'";
                                                                            }

                                                                            if ($error == 'city') {
                                                                                echo "style='color: red; border: red solid 1px'";
                                                                            }
                                                                            ?> />
                        <div class="input-icon"><i class="fa fa-map-marker"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Address" name="address" <?php
                                                                                if ($retry) {
                                                                                    echo "value='" . $_GET['address'] . "'";
                                                                                } else {
                                                                                    echo "value='" . $_SESSION['address'] . "'";
                                                                                }

                                                                                if ($error == 'address') {
                                                                                    echo "style='color: red; border: red solid 1px'";
                                                                                }
                                                                                ?> />
                        <div class="input-icon"><i class="fa fa-address-card"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-half">
                        <?php $date = explode('-', $_SESSION['DOB']); ?>
                        <h4>Date of Birth</h4>
                        <div class="input-group">
                            <div class="col-third">
                                <input type="text" placeholder="DD" name="day" <?php echo "value='" . ($_REQUEST['day'] ??  $date[2]) . "'";
                                                                                if ($error == 'day') {
                                                                                    echo "style='color: red; border: red 1px solid'";
                                                                                } ?> />
                            </div>
                            <div class="col-third">
                                <input type="text" placeholder="MM" name="month" <?php echo "value='" . ($_REQUEST['month'] ??  $date[1])  . "'";
                                                                                    if ($error == 'month') {
                                                                                        echo "style='color: red; border: red 1px solid'";
                                                                                    } ?> />
                            </div>
                            <div class="col-third">
                                <input type="text" placeholder="YYYY" name="year" <?php echo "value='" . ($_REQUEST['year']  ??  $date[0])  . "'";
                                                                                    if ($error == 'year') {
                                                                                        echo "style='color: red; border: red 1px solid'";
                                                                                    } ?> />
                            </div>
                        </div>
                    </div>
                    <div class="col-half">
                        <h4>Gender</h4>
                        <div class="input-group">
                            <input id="gender-male" type="radio" name="gender" value="male" <?php
                                                                                            if ($retry) {
                                                                                                if ($_REQUEST['gender'] == 'male') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            } elseif ($_SESSION['gender'] == 'male') {
                                                                                                echo "checked";
                                                                                            }; ?> />
                            <label for="gender-male">Male</label>
                            <input id="gender-female" type="radio" name="gender" value="female" <?php if ($retry) {
                                                                                                    if ($_REQUEST['gender'] == 'female') {
                                                                                                        echo "checked";
                                                                                                    }
                                                                                                } elseif ($_SESSION['gender'] == 'female') {
                                                                                                    echo "checked";
                                                                                                }; ?> />
                            <label for="gender-female">Female</label>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Save Change" class="submit">
                <br><br>
                <a href="../pages/accountAdmin.php?accChoice=MyAccount" id='cnl'>cancel change</a>
            </form>
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
            <p class='p2'>Copyright To DRS Gaming &copy; 2020-". date('Y')." </p>
        </div>
    </footer>

<script src="../javascript/script.js"></script>
</body>

</html>