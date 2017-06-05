<?php
// Registration Page Controller 
//
// Begin this session
session_start();
//
// Include function to sanitize input from GET and POST variables 
require_once('/var/www/html/autoplanet/application/helpers/sanchars.php');
// Include function to generate view for page header 
require_once('/var/www/html/autoplanet/application/views/headerview.php');
// Include function to generate view for registration page
require_once('/var/www/html/autoplanet/application/views/registrationview.php');
// Include function to generate view for showing a message
require_once('/var/www/html/autoplanet/application/views/messageview.php');
// Include function for datamodel to find out if user already exists
require_once('/var/www/html/autoplanet/application/models/loginmodel.php');
// Include function for registrationmodel to add user to user database 
require_once('/var/www/html/autoplanet/application/models/registrationmodel.php');
//
// If there is a session then notify user he is already logged in
if(isset($_SESSION['user_id'])) {
$registrationresult="You are already logged in !";
} else {
//
// Show no message in case the user hasn't yet provided input
if ((empty($_POST['Name'])) AND (empty($_POST['Username']))) {
$registrationresult="";
} else {
//
// Call function san_chars to sanitize input from search form input
list($Name, $Username, $First, $Second)=san_chars($_POST['Name'], $_POST['Username'], $_POST['First'], $_POST['Second']);
//
// Warn user if he hasn't filled in his name
if (empty($Name)) {
$registrationresult='Please fill in your name !';
// Validate e-mail address
} elseif (!filter_var($Username, FILTER_VALIDATE_EMAIL)) {
$registrationresult="Please fill in a valid email address !";
// Warn user if he hasn't filled in a password
} elseif ((empty($First)) OR (empty($Second))) {
$registrationresult="Please fill in a password !"; 
// Check if first and second entered password match
} elseif (strcmp($First, $Second) !== 0) {
$registrationresult="First and second password values don't match - Please try again !!!";
// Validate password strength
} elseif (strlen($Second) < 8) {
$registrationresult="Password must be at least 8 characters !";
} elseif (!preg_match("#[0-9]+#", $Second)) {
$registrationresult="Password must include at least one number !";
} elseif (!preg_match("#[a-zA-Z]+#", $Second)) {
$registrationresult="Password must include at least one letter !";
}
else {
// Call datamodel function to search for user in the userdatabase
$founduser=search_user($Username);
$Count=0;
foreach ($founduser as $row); 
if ($Username == $row['Username']) {
$registrationresult="User already exists, please use another Username !";
} else {
$HashPW = password_hash($Second, PASSWORD_DEFAULT);
// Call registrationmodel to add a new user to the user database
//
$registrationresult=add_user($Name,$Username,$HashPW);
//
// Generate the view for the search page
}}}}
// Generate the page header view depending on session status
page_header('Register', $_SESSION['user_id']);
//
create_registrationpage($registrationresult);
?>
