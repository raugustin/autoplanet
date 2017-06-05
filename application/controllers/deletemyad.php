<?php
// Controller for deleting a car ad 
//
// Begin this session
session_start();
//
// Include variables with path to target directory
require_once('/var/www/html/autoplanet/application/helpers/targetdircarimages.php');
// Include function to sanitize input from GET and POST variables 
require_once('/var/www/html/autoplanet/application/helpers/sanchars.php');
// Include function to generate view for page header 
require_once('/var/www/html/autoplanet/application/views/headerview.php');
// Include function to generate view for showing a message
require_once('/var/www/html/autoplanet/application/views/messageview.php');
// Include function for datamodel to delete car 
require_once('/var/www/html/autoplanet/application/models/deletemyadmodel.php');
// Include function to generate view for showing search results
require_once('/var/www/html/autoplanet/application/views/myautoplanetview.php');
// Include function to check if user is authorised to access the web page
require_once('/var/www/html/autoplanet/application/helpers/checkuserauth.php');
//
// Generate the page header view depending on session status
page_header('Delete My Ad', $_SESSION['user_id']);
//
// Check if user is authorised to access this page (depending on his role)
check_authorisation("autoplanetuser");
//
// Fetch session variable "seller name" and "seller email"
$Name=$_SESSION["Name"];
$Email=$_SESSION["Email"];
//
// Fetch index number of the car ad which the user wants to delete
$Index_Raw = $_GET['item'];
// Sanitize input - only integer numbers allowed
$Index = filter_var($Index_Raw, FILTER_SANITIZE_NUMBER_INT);
// Call datamodel function to delete car advert from the database
$message=delete_car($Index, $Name, $Email, $TargetDir);
// Show message to user that the car ad has been deleted (or not)
//
show_message($message);
//
// Redirect user to myautoplanet page after 5 seconds
header('Refresh: 5; URL=https://www.autoplanet.nu/myautoplanet');
?>
