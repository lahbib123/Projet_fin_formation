<?php
session_start();
if (isset($_SESSION['connected'])) {
    if ($_SESSION['role'] == 'user') {
        header('location:account.php');
    } elseif ($_SESSION['role'] == 'admin') {
        header('location:accountAdmin.php');
    } else {
        header('location:accountStoreOwner.php');
    }
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
            <h1><?php echo 'Log In' ?></h1>
        </div>
    </header>

    <section>
        <div class="container">
            <form action="../php/try_login.php" method="POST" autocomplete="off">
                <div class="row">
                    <h4>Account</h4>
                    <div class="input-group input-group-icon">
                        <input type="text" placeholder="Email Adress" autofocus name="email" />
                        <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    </div>
                    <div class="input-group input-group-icon">
                        <input type="password" placeholder="Password" name="password" />
                        <div class="input-icon"><i class="fa fa-key"></i></div>
                    </div>
                </div>
                <input type="submit" value="Log In" class="submit">
                <br><br>
                <h4><a href="singup.php" id="l">Create account</a></h4>
            </form>
        </div>
    </section>

    <?php require_once "../php/footer.php" ?>
    <script src="../javascript/script.js"></script>
</body>

</html>