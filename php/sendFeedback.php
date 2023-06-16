<?php
require_once 'connect.php';
session_start();

$feedbackOwnerID = $_SESSION['ID'];
$feedbackOwnerName = $_SESSION['fullName'];
$feedbackTitle = $_REQUEST['feedbackTitle'];
$feedbackBody = $_REQUEST['feedbackBody'];

if (!preg_match("/[\w|\s|\d]+/", $feedbackTitle)) {
    header("location:../pages/account.php?accChoice=SendFeedback&alert=Invalide Title_Please enter a valid title_white_red&feedbackTitle=$feedbackTitle&feedbackBody=$feedbackBody");
}
elseif (strlen($feedbackBody) < 8) {
    header("location:../pages/account.php?accChoice=SendFeedback&alert=Invalide Feedback_Please enter a valid feedback_white_red&feedbackTitle=$feedbackTitle&feedbackBody=$feedbackBody");
}
else {
    $req = "INSERT INTO feedBack (`feedbackOwnerID`,`feedbackOwnerName`,`feedbackTitle`,`feedbackBody`) 
            VALUES ('$feedbackOwnerID','$feedbackOwnerName','$feedbackTitle','$feedbackBody')";
    $query = mysqli_query($connect, $req);
    if ($query) {
        header('location:../pages/account.php?accChoice=SendFeedback&alert=Mission Done_Feedback has been sent successfully_white_green');
    } else {
        header('location:../pages/account.php?accChoice=SendFeedback&alert=Mission Failed_Please try again later_white_green');
    }
}
