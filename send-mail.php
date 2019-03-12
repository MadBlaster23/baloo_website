<?php
$admin = "contact@baloomoving.com";
$firstname = $_REQUEST['first_name'];
$lastname = $_REQUEST['last_name'];
$email = $_REQUEST['user_email'];
$phone = $_REQUEST['user_phone'];
$address1 = $_REQUEST['user_address1'];
$address2 = $_REQUEST['user_address2'];
$number = $_REQUEST['user_number'];
$date = $_REQUEST['user_date'];
$comments = $_REQUEST['user_comments'];
$msg =
"First Name: ".$firstname."\r\n".
"Last Name: ".$lastname."\r\n".
"Email: ".$email."\r\n".
"Phone number: ".$phone."\r\n".
"Pick-up address: ".$address1."\r\n" .
"Delivery address: ".$address2."\r\n".
"Number of rooms: ".$number."\r\n".
"Moving date: ".$date."\r\n".
"Any additional details: ".$comments;
if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['user_email']) && isset($_POST['user_phone']) && isset($_POST['user_address1']) && isset($_POST['user_address2']) && isset($_POST['user_number']) && isset($_POST['user_date']) && isset($_POST['user_comments'])) {
    mail( "$admin", "Requested date: ".$date, $msg, "From: ".$email);
}
?>
