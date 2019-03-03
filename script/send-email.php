<?php
/*
This first bit sets the email address that you want the form to be submitted to.
You will need to change this value to a valid email address that you can access.
*/
$admin = "masblaster23@protonmail.com";

/*
This bit sets the URLs of the supporting pages.
If you change the names of any of the pages, you will need to change the values here.
*/
$index_page = "index.html";
$error_page = "error-message.html";
$thankyou_page = "thank-you.html";

/*
This next bit loads the form field data into variables.
If you add a form field, you will need to add it here.
*/
$email = $_REQUEST['email'];
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$phone = $_REQUEST['phone'];
$address1 = $_REQUEST['address1'];
$address2 = $_REQUEST['address2'];
$number = $_REQUEST['number'];
$date = $_REQUEST['date'];
$comments = $_REQUEST['comments'];
$msg =
"First Name: " . $firstname . "\r\n" .
"Last Name: " . $lastname . "\r\n" .
"Email: " . $email . "\r\n" .
"Phone number: " . $phone . "\r\n" .
"Pick-up address: " . $address1 . "\r\n" .
"Delivery address: " . $address2 . "\r\n" .
"Number of rooms: " . $number . "\r\n" .
"Moving date: " . $date . "\r\n" .
"Any additional details: " . $comments ;

/*
The following function checks for email injection.
Specifically, it checks for carriage returns - typically used by spammers to inject a CC list.
*/
function isInjected($str) {
	$injections = array('(\n+)',
	'(\r+)',
	'(\t+)',
	'(%0A+)',
	'(%0D+)',
	'(%08+)',
	'(%09+)'
	);
	$inject = join('|', $injections);
	$inject = "/$inject/i";
	if(preg_match($inject,$str)) {
		return true;
	}
	else {
		return false;
	}
}

// If the user tries to access this script directly, redirect them to the feedback form,
if (!isset($_REQUEST['email'])) {
header( "Location: $index_page" );
}

// If the form fields are empty, redirect to the error page.
elseif (empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($address1) || empty($address2) || empty($number) || empty($date)) {
header( "Location: $error_page" );
}

/*
If email injection is detected, redirect to the error page.
If you add a form field, you should add it here.
*/
elseif ( isInjected($firstname) || isInjected($lastname)  || isInjected($email) || isInjected($phone) || isInjected($address1) || isInjected($address2) || isInjected($number) || isInjected($date) ) {
header( "Location: $error_page" );
}

// If we passed all previous tests, send the email then redirect to the thank you page.
else {

	mail( "$admin", "Feedback Form Results", $msg );

	header( "Location: $thankyou_page" );
}
?>
