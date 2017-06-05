<?php
// Controller for MyAutoPlanet page 
//
// Begin this session
session_start();
//
// Include function to sanitize input from GET and POST variables 
require_once('/var/www/html/autoplanet/application/helpers/sanchars.php');
// Include function to generate view for page header 
require_once('/var/www/html/autoplanet/application/views/headerview.php');
// Include function to generate view for showing a message
require_once('/var/www/html/autoplanet/application/views/messageview.php');
// Include function for datamodel to search car 
require_once('/var/www/html/autoplanet/application/models/myautoplanetmodel.php');
// Include function to generate view for showing search results
require_once('/var/www/html/autoplanet/application/views/myautoplanetview.php');
// Include function to check if user is authorised to access the web page
require_once('/var/www/html/autoplanet/application/helpers/checkuserauth.php');
//
// Generate the page header view depending on session status
page_header('My Autopplanet', $_SESSION['user_id']);
//
// Check if user is authorised to access this page (depending on his role)
check_authorisation("autoplanetuser");
//
// Fetch session variable "seller name" and "seller email"
$Name=$_SESSION["Name"];
$Email=$_SESSION["Email"];
//
// Call datamodel function to search for cars of user in the database
//
$foundcars=show_mycars($Name,$Email);
//
// Generate the view for the My Auto Planet page
create_myautoplanetpage($foundcars,$Name);
?>
