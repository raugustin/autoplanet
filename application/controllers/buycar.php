<?php
// Controller for buy car page
//
// Begin this session
session_start();
//
// Include function to sanitize input from GET and POST variables to character strings
require_once('/var/www/html/autoplanet/application/helpers/sanchars.php');
// Include function to sanitize input from GET and POST variables to digits
require_once('/var/www/html/autoplanet/application/helpers/sandigits.php');
// Include function to generate view for page header 
require_once('/var/www/html/autoplanet/application/views/headerview.php');
// Include function to generate view for showing a message
require_once('/var/www/html/autoplanet/application/views/messageview.php');
// Include function for datamodel to delete car 
require_once('/var/www/html/autoplanet/application/models/buycarmodel.php');
// Include function to generate view for showing search results
require_once('/var/www/html/autoplanet/application/views/buycarview.php');
// Include function to send an email to the seller
require_once('/var/www/html/autoplanet/application/helpers/sendemailseller.php');
//
$buycarformstatus=0;
$warning="";
//
// Generate the page header view depending on session status
page_header('Buy car', $_SESSION['user_id']);
//
// If this page is requested via a GET request
if($_SERVER['REQUEST_METHOD'] == "GET") {
//
// // Sanitize input from the "item" parameter in the URL to max 10 digits
List($Index) = san_digits($_GET['item']);
//
// Call datamodel function to Get car and seller details 
$result=Get_Seller_Car_Details($Index);
//
// Check if car and seller lookup succeeded
if ($result == 0) {
show_message("Something went wrong....Please try later again.");
exit(0);
}}
//
// If user has submitted the form
if($_SERVER['REQUEST_METHOD'] == "POST") {
//
// Start session for captcha check
session_start();
//
$buycarformstatus=1;
//
// Sanitize the user input from the buy car form - Call function san_chars
list($Buyername, $Buyeremail, $Buyermessage, $Captcha)=san_chars(@$_POST['Buyername'], @$_POST['Buyeremail'], $_POST['Buyermessage'], $_POST['captcha']);
//
// // Sanitize input from the "item" parameter in the URL to max 10 digits
List($Index) = san_digits($_POST['item']);
//
// Validate the user input
//
// Check if all the fields have been filled in
if ((empty($Buyername))or(empty($Buyeremail))) {
$warning="Please fill in your name and email !";
//
// Check if the input value for the Buyername field is valid
} elseif (!preg_match("/^[a-zA-Z ]*$/",$Buyername)) {
$warning='Name field may contain only letters, please try again !';
//
// Validate e-mail address and show error message in case of invalid email
} elseif (!filter_var($Buyeremail, FILTER_VALIDATE_EMAIL)) {
$warning="Please fill in a valid email address !";
//
// Check if the input value for the Buyermessage field is valid
} elseif (!preg_match("/^[a-z?-Z0-;!.,+\-() ]*$/",$Buyermessage)) {
$warning='Message field may contain only letters and numbers, please try again !';
//
} elseif ($Captcha != $_SESSION['digit']) {
$warning='Sorry, the CAPTCHA code entered was incorrect!<br>Please try again';
session_destroy();
//
} else {
// Call datamodel function to Get car and seller details 
$result=Get_Seller_Car_Details($Index);
//
// Check if car and seller lookup succeeded
if ($result == 0) {
show_message("Something went wrong....Please try later again.");
exit(0);
}
//
// send an email to the seller
send_email_to_seller($result,$Buyername,$Buyeremail,$Buyermessage);
//
$warning="An email has been send to the seller !<br>Returning to home page within 5 seconds...";
// Redirect user to autoplanet home page after 5 seconds
header('Refresh: 5; URL=https://www.autoplanet.nu');
//
}}
// Generate the view for the buy car page
create_buycarpage($result,$buycarformstatus,$Index,$warning);
?>
