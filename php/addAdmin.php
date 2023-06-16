<?php
require_once 'connect.php';
require_once 'emailExist.php';

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

$retry = 0;
if (strlen($fullName) < 6 || !preg_match("/^[aA-zZ]+[\s_][aA-zZ]+$/", $fullName)){

    $retry = 1;
    $error = 'fullName';
    $alert = "Invalid name_You must enter your correct full name and it should not be less than 6 characters_white_red";

}
elseif (emailExist($email) ) {
    
    $retry = 1;
    $error = 'email';
    $alert = "This Account Exists_You can log in with this account because it already exists_white_red";

}
elseif (!preg_match("/^([a-z]|[A-Z]|[0-9]|_)+@[a-z]+\.[a-z]+$/", $email))
{
    $retry = 1;
    $error = 'email';
    $alert = "Invalid Email_The email you entered is invalid_white_red";
}
elseif(!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/", $password))
{
    $retry = 1;
    $error = 'password';
    $alert = "Invalid Password_You must enter the password consisting of uppercase and lowercase letters and numbers and the longest one must not be less than 8 characters_white_red";
}
elseif (!preg_match("/^0[567][0-9]{8}$/", $phone)) {
    
    $retry = 1;
    $error = 'phone';
    $alert = "Invalid Phone Number_The phone number you entered is invalid Please enter a valid phone number_white_red";

}
elseif(strlen($city) < 3)
{

    $retry = 1;
    $error = 'city';
    $alert = "Invalid City_Please enter a valid city_white_red";

}
elseif(strlen($address) < 3)
{
    $retry = 1;
    $error = 'address';
    $alert = "Invalid Address_Please enter a valid address_white_red";

}
elseif( !is_int($day) and ((int)$day < 1 || (int)$day > 31))
{
    $retry = 1;
    $error = 'day';
    $alert = "Invalid day_Please enter a valid day_white_red";

}
elseif( !is_int($month) and ((int)$month < 1 || (int)$month > 12))
{
    $retry = 1;
    $error = 'month';
    $alert = "Invalid Month_Please enter a valid month_white_red";

}
elseif(!is_int($year) and ((int)$year < (int)date("Y", strtotime('-100 year')) || (int)$year > (int)date("Y")))
{
    $retry = 1;
    $error = 'year';
    $alert = "Invalid Year_Please enter a valid year_white_red";

}
elseif ((int)$year > (int)date("Y", strtotime('-18 year')))
{
    $retry = 1;
    $error = 'year';
    $alert = "Registration Error_You cannot register on the site and you are not more than 18 years old_white_red";
}
elseif (!isset($gender))
{
    $retry = 1;
    $error = 'gender';
    $alert = "Gender Error_Please select your gender_white_red";
}

else 
{

    $req = "INSERT INTO `admins_accounts` (`fullName`,`email`,`password`,`phone`,`DOB`,`gender`,`city`,`address`)
        VALUES ('$fullName','$email','$password','$phone','$DOB','$gender','$city','$address')";

    $singup = mysqli_query($connect, $req);
    $req2 = "INSERT INTO `all_accounts` (`account`, `user_admin`) VALUES ('$email', 'admin')";
    mysqli_query($connect,$req2);
    if ($singup) {
        header('location:../pages/accountStoreOwner.php?accChoice=AddAdmin&alert=Mission succeeded_Account admin added successfully_white_green');
    }
}

if ($retry){
    header("location:../pages/accountStoreOwner.php?accChoice=AddAdmin&retry=$retry&error=$error&alert=$alert&fullName=$fullName&email=$email&password=$password&phone=$phone&city=$city&address=$address&day=$day&month=$month&year=$year&gender=$gender");
}
