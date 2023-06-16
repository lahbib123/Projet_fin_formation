<?php
require_once 'connect.php';
function emailExist($email) {
    $req = "SELECT * FROM `all_accounts` WHERE account='$email'";
    $test = mysqli_query($GLOBALS['connect'], $req);
    if (mysqli_num_rows($test))
    {
        return true;
    }
    else
    {
        return false;
    }
}

?>