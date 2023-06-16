<?php
$a = explode('/', $_SERVER['HTTP_REFERER']);
$a = explode("?", end($a));
$page = current($a);


if ($page != 'login.php' && $page != "accountStoreOwner.php") {
    header('location:../index.php');
}

$this_page = $_SERVER['PHP_SELF'];
if (isset($_GET['retry']) && isset($_GET['error'])) {
    $retry = $_GET['retry'];
    $error = $_GET['error'];
} else {
    $retry = 0;
    $error = 0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../php/head.php" ?>
    <link rel="stylesheet" href="../css/styleAcc.css">
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

    <header>
        <div class="header">
            <h2 style="font-size: 60px;">Let's_Shop</h2>
        </div>
    </header>

    <span id="menu" onclick="openNav()">&#9776; Menu</span>
    <span class="closebtnMenu" onclick="closeNav()">&times;</span>
    <div id="mySidenav" class="sidenav">
        <a href="<?php echo $this_page . '?accChoice=AddAdmin' ?>">Add Admin</a>
        <a href="<?php echo $this_page . '?accChoice=AddCategorie' ?>">Add Categorie</a>
        <a href="<?php echo $this_page . '?accChoice=ShowAllAdminsAccounts' ?>">Show All Admins Accounts</a>
        <a href="<?php echo $this_page . '?accChoice=ShowAllUsersAccounts' ?>">Show All Users Accounts</a>
        <a href="<?php echo $this_page . '?accChoice=DelateUserAccount' ?>">Delete User Account</a>
        <a href="<?php echo $this_page . '?accChoice=DelateAdminAccount' ?>">Delete Admin Account</a>
        <a href="<?php echo $this_page . '?accChoice=ShowFeedback' ?>">Show Feedback</a>
        <a href="../php/signOut.php">Sign out</a>

    </div>
    <section>
        <div class="section" style="overflow: auto;">

            <?php if (isset($_REQUEST['accChoice'])) {
                require_once "../php/accountStoreOwnerChoice.php";
            } else {
                echo "<center><h1>Welcom DRS</h1></center>";
            }
            ?>

        </div>
    </section>

    <script src="../javascript/script.js"></script>

</body>

</html>