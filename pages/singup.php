<?php
session_start();
if (isset($_SESSION['connected'])){
    if ($_SESSION['role'] == 'user') {
        header('location:account.php');
    }elseif ($_SESSION['role'] == 'admin'){
        header('location:accountAdmin.php');
    }else{
        header('location:accountStoreOwner.php');
    }
}
if (isset($_GET['retry']) && isset($_GET['error'])) {
    $retry = $_GET['retry'];
    $error = $_GET['error'];
} else {
    $retry = 0;
    $error = 0;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../php/connect.php';
    require_once '../php/emailExist.php';

    $fullName = strtolower($_REQUEST['fullName']);
    $email = strtolower($_REQUEST['email']);
    $password = $_REQUEST['password'];
    $phone = $_REQUEST['phone'];
    $day = $_REQUEST['day'];
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
    $DOB =  $year . "-" . $month . "-" . $day;
    $gender = $_REQUEST['gender'];
    $city = ucfirst($_REQUEST['city']);
    $address = ucfirst($_REQUEST['address']);
    $acceptTerms = isset($_REQUEST['acceptTerms']);

    require_once '../php/cheakAndSingUp.php';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../php/head.php" ?>
    <link rel="stylesheet" href="../css/styleForm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <h1>Sing Up</h1>
        </div>
    </header>

    <section>

        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                <div class="row">
                    <h4>Account</h4>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Full Name" autofocus name="fullName" <?php if ($retry) {
                                                                                                        echo "value='" . $_GET['fullName'] . "'";
                                                                                                    };
                                                                                                    if ($error == 'fullName') {
                                                                                                        echo "style='color: red; border: red solid 1px'";
                                                                                                    } ?> />
                        <div class="input-icon"><i class="fa fa-user"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Email Adress" name="email" <?php if ($retry) {
                                                                                        echo "value='" . $_GET['email'] . "'";
                                                                                    };
                                                                                    if ($error == 'email') {
                                                                                        echo "style='color: red; border: red solid 1px'";
                                                                                    } ?> />
                        <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Password" name="password" <?php if ($retry) {
                                                                                                    echo "value='" . $_GET['password'] . "'";
                                                                                                };
                                                                                                if ($error == 'password') {
                                                                                                    echo "style='color: red; border: red solid 1px'";
                                                                                                } ?> />
                        <div class="input-icon"><i class="fa fa-key"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Phone number" name="phone" <?php if ($retry) {
                                                                                                        echo "value='" . $_GET['phone'] . "'";
                                                                                                    };
                                                                                                    if ($error == 'phone') {
                                                                                                        echo "style='color: red; border: red solid 1px'";
                                                                                                    } ?> />
                        <div class="input-icon"><i class="fa fa-phone"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="City" name="city" <?php if ($retry) {
                                                                                echo "value='" . $_GET['city'] . "'";
                                                                            };
                                                                            if ($error == 'city') {
                                                                                echo "style='color: red; border: red solid 1px'";
                                                                            } ?> />
                        <div class="input-icon"><i class="fa fa-map-marker"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Address" name="address" <?php if ($retry) {
                                                                                    echo "value='" . $_GET['address'] . "'";
                                                                                };
                                                                                if ($error == 'address') {
                                                                                    echo "style='color: red; border: red solid 1px'";
                                                                                } ?> />
                        <div class="input-icon"><i class="fa fa-address-card"></i></div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-half">
                        <h4>Date of Birth</h4>
                        <div class="input-group">
                            <div class="col-third">
                                <input type="text" placeholder="DD" name="day" <?php if ($retry) {
                                                                                    echo "value='" . $_GET['day'] . "'";
                                                                                };
                                                                                if ($error == 'day') {
                                                                                    echo "style='color: red; border: red solid 1px'";
                                                                                } ?> />
                            </div>
                            <div class="col-third">
                                <input type="text" placeholder="MM" name="month" <?php if ($retry) {
                                                                                        echo "value='" . $_GET['month'] . "'";
                                                                                    };
                                                                                    if ($error == 'month') {
                                                                                        echo "style='color: red; border: red solid 1px'";
                                                                                    } ?> />
                            </div>
                            <div class="col-third">
                                <input type="text" placeholder="YYYY" name="year" <?php if ($retry) {
                                                                                        echo "value='" . $_GET['year'] . "'";
                                                                                    };
                                                                                    if ($error == 'year') {
                                                                                        echo "style='color: red; border: red solid 1px'";
                                                                                    } ?> />
                            </div>
                        </div>
                    </div>
                    <div class="col-half">
                        <h4>Gender</h4>
                        <div class="input-group" <?php if ($retry) {
                                                        if ($error == 'gender') {
                                                            echo "style='color: red; border: red solid 1px'";
                                                        }
                                                    } ?>>
                            <input id="gender-male" type="radio" name="gender" value="male" <?php if ($retry && $_GET['gender'] == 'male') {
                                                                                                echo 'checked';
                                                                                            } ?> />
                            <label for="gender-male">Male</label>
                            <input id="gender-female" type="radio" name="gender" value="female" <?php if ($retry && $_GET['gender'] == 'female') {
                                                                                                    echo 'checked';
                                                                                                } ?> />
                            <label for="gender-female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h4>Terms and Conditions</h4>
                    <div class="input-group">
                        <br>
                        <input id="terms" type="checkbox" name="acceptTerms" <?php if ($retry) {
                                                                                    if ($error !== 'acceptTerms') {
                                                                                        echo 'checked';
                                                                                    }
                                                                                } ?> />
                        <label for="terms" <?php if ($retry) {
                                                if ($error == 'acceptTerms') {
                                                    echo "style='color: red;'";
                                                }
                                            } ?>>I accept the terms and conditions for signing up to this service, and hereby confirm I have read the privacy policy.</label>
                    <br>
                </div>
                </div>
                <input type="submit" value="Sing Up" class="submit">
                <br><br>
                <h4><a href="login.php" id="l">I have an account</a></h4>
            </form>
        </div>
    </section>

    <?php require_once "../php/footer.php" ?>

    <script src="../javascript/script.js"></script>
</body>

</html>