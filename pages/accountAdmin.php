<?php

session_start();

if ($_SESSION['role'] == 'user') {
    header('location:account.php');
}elseif ($_SESSION['role'] == 'drs'){
    header('location:accountStoreOwner.php');
}elseif ($_SESSION['role'] == 'admin'){
}else{
    header('location:../index.php'); 
}

$this_page = $_SERVER['PHP_SELF'];
$accChoice = $_GET['accChoice'];


if (!isset($accChoice)) {
    header("location:$this_page?accChoice=MyAccount");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../php/head.php" ?>
    <link rel="stylesheet" href="../css/styleAcc.css">
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
            <h1><?php echo $_REQUEST['accChoice'] ?></h1>
        </div>
    </header>
    <span id="menu" onclick="openNav()">&#9776; Menu</span>
    <span class="closebtnMenu" onclick="closeNav()">&times;</span>
    <div id="mySidenav" class="sidenav">
        <a href="<?php echo $this_page . '?accChoice=MyAccount' ?>">My Account</a>
        <a href="<?php echo $this_page . '?accChoice=AddCategorie' ?>">Add Categorie</a>
        <a href="<?php echo $this_page . '?accChoice=DelateUserAccount' ?>">Delete User Account</a>
        <a href="<?php echo $this_page . '?accChoice=ShowFeedback' ?>">Show Feedback</a>
        <a href="<?php echo $this_page . '?accChoice=ChangePassword' ?>">Change Password</a>
        <a href="<?php echo $this_page . '?accChoice=DelateMyAccount' ?>">Delete My Account</a>
        <a href="../php/signOut.php">Sign out</a>

    </div>
    <section>
        <div class="section">
            <?php require_once "../php/accountAdminChoice.php" ?>
        </div>
        </div>
    </section>
    <?php require_once "../php/footer.php" ?>
    <script src="../javascript/script.js"></script>
</body>

</html>