<?php
session_start();
session_destroy();
session_unset();
$alert = $_REQUEST['alert'] ?? "Sign Out_Signed out successfully_white_green";
header("location:../index.php?alert=$alert");
?>