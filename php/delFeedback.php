<?php
require_once 'connect.php';

$feedbackID = $_REQUEST['feedbackID'];
$a = explode('/', $_SERVER['HTTP_REFERER']);
$a = explode("?", end($a));
$page = current($a);
$req = "DELETE FROM feedback WHERE feedbackID=$feedbackID";
$query = mysqli_query($connect, $req);

header("location:../pages/$page?accChoice=ShowFeedback&alert=Deleted successfully_Comment removed successfully_white_green");
