<?php
// Home Page & Search Car Controller 
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
require_once('/var/www/html/autoplanet/application/models/searchcarmodel.php');
// Include function to generate view for showing search results
require_once('/var/www/html/autoplanet/application/views/searchcarview.php');
// Include function to check if user is authorised to access the web page
require_once('/var/www/html/autoplanet/application/helpers/checkuserauth.php');
//
// Generate the page header view depending on session status
page_header('Home', $_SESSION['user_id']);
//
check_authorisation("anonymous");
//
// Set value for search form status depending on if input is submitted
if (empty($_GET['Make'])) {
$searchformstatus=0;
} 
else {
$searchformstatus=1;
}
//
// Call function san_chars to sanitize input from search form input
list($Make, $BodyType, $Fuel)=san_chars(@$_GET['Make'], $_GET['BodyType'], @$_GET['Fuel']);
//
// Call datamodel function to search for cars in the database
//
$foundcars=search_car($Make,$BodyType,$Fuel);
//
// Generate the view for the search page
search_page($foundcars,$searchformstatus);
?>
