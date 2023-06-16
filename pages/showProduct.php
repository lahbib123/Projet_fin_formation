<?php
session_start();
if (isset($_SESSION['connected'])) {
    if (!isset($_COOKIE['myCart' . $_SESSION['ID']])) {
        setcookie('myCart' . $_SESSION['ID'], '[]', time() + (7 * 24 * 60 * 60), '/');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once "../php/head.php" ?>
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
            <h1><?php echo $_REQUEST['category'] ?></h1>
        </div>
    </header>

    <section>
        <?php require_once "../php/product.php" ?>
    </section>

    <aside>
        <hr>
        <div class="h2center">
            <h2>Contents you may like</h2>
        </div>
        <div class="center">
            <?php require_once "../php/aside.php" ?>
        </div>
    </aside>

    <?php require_once "../php/footer.php" ?>
    <script src="../javascript/script.js"></script>
</body>

</html>