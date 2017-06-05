<?php
// Login Controller 
//
// Begin this session
session_start();
//
// Include function to sanitize input from GET and POST variables 
require_once('/var/www/html/autoplanet/application/helpers/sanchars.php');
// Include function to generate view for page header 
require_once('/var/www/html/autoplanet/application/views/headerview.php');
// Include function to generate view for search form
require_once('/var/www/html/autoplanet/application/views/loginview.php');
// Include function to generate view for showing a message
require_once('/var/www/html/autoplanet/application/views/messageview.php');
// Include function for datamodel to search user
require_once('/var/www/html/autoplanet/application/models/loginmodel.php');
//
// If there is a session then notify user he is already logged in
if(isset( $_SESSION['user_id'])) {
$loginresult='You are already logged in !';
} else {
//
// Show no message in case the user hasn't yet provided input
if ((empty($_POST['Username'])) AND (empty($_POST['Password']))) {
$loginresult="";
} else {
//
// Call function san_chars to sanitize input from Login form
list($Username, $Password)=san_chars($_POST['Username'], $_POST['Password']);
//
// Validate e-mail address and show error message in case of invalid email
if (!filter_var($Username, FILTER_VALIDATE_EMAIL)) {
$loginresult="Please fill in a valid email address !";
//
// Validate password and show error message in case no password is provided
} elseif (strlen($Password) == 0) {
$loginresult="Please fill in a password !";
} 
else {
// Call datamodel function to search for user in the userdatabase
//
$founduser=search_user($Username);
$Count=0;
foreach ($founduser as $row) 
if (password_verify($Password, $row['HashPW'])) {
$_SESSION['user_id'] = $row['user_id'];
// Show welcome message in case user has provided the right credentials
$loginresult="Welcome"."&nbsp".$row['Name']."&nbsp".', you are logged in !';
// Set session variables
$_SESSION["Name"] = $row['Name'];
$_SESSION["Email"] = $row['Username'];
}
else {
// Show error message in case user credentials are unknown
$loginresult="Login failed !";
}}}}
//
// Generate the page header view depending on session status
page_header('Login', $_SESSION['user_id']);
//
// Generate the view for the login page
create_loginpage($loginresult);
?>
