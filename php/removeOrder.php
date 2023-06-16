<?php
require_once "connect.php";
$id = $_REQUEST['idOrder'];
$req = "DELETE FROM orders WHERE id='$id'";
mysqli_query($connect, $req);

header('location:../pages/account.php?accChoice=ShowComund&alert=The order has been successfully deleted__white_green');
