<?php
// Sell my Car Controller 
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
// Include function to generate view for sell my car form
require_once('/var/www/html/autoplanet/application/views/sellmycarview.php');
// Include function to add a car to the autoplanet database
require_once('/var/www/html/autoplanet/application/models/sellmycarmodel.php');
// Include function to check if user is authorised to access the web page
require_once('/var/www/html/autoplanet/application/helpers/checkuserauth.php');
//
$TargetFilePath = $TargetDir.basename($_FILES['carpic']['name']); 
$Pic=($_FILES['carpic']['name']);
$sellmycarformstatus=0;
$warning="";
//
// Generate the page header view depending on session status
page_header('Sell my car', $_SESSION['user_id']);
//
// Check if user is authorised to access this page (depending on his role)
check_authorisation("autoplanetuser");
//
// Fetch session variable "seller name" and "seller email"
$Name=$_SESSION["Name"];
$Email=$_SESSION["Email"];
//
// Check if user has submitted the form
if(isset($_POST["submit"])) {
$sellmycarformstatus=1;
//
// Sanitize the user input from the search form - Call function san_chars
list($Make, $Model, $Color, $BodyType, $Year, $Fuel, $Price)=san_chars(@$_POST['Make'], @$_POST['Model'], $_POST['Color'], $_POST['BodyType'], $_POST['Year'], @$_POST['Fuel'], @$_POST['Price']);
//
// Validate the user input
//
// Check if all the fields have been filled in
if ((empty($Make))or(empty($Model)) or (empty($Color))or(empty($BodyType))or(empty($Year))or(empty($Price))) {
$warning="Please fill in all the fields !";
//
// Check if the input value for the make field is valid
} elseif (!preg_match("/^[a-zA-Z- ]*$/",$Make)) {
$warning='Make field may contain only letters, please try again !';
//
// Check if the input value for the BodyType field is valid
} elseif (($BodyType<>"Sedan")AND($BodyType<>"Station")AND($BodyType<>"Hatchback")AND($BodyType<>"Coupe")AND($BodyType<>"MPV")AND($BodyType<>"SUV")) {
$warning='Invalid value for BodyType, please try again !';
//
// Check if the input value for the Model field is valid
} elseif (!preg_match("/^[a-zA-Z0-9-]*$/",$Model)) {
$warning='Model field may contain only letters and numbers, please try again !';
//
// Check if the input value for the fuel field is valid
} elseif (($Fuel<>"Petrol")AND($Fuel<>"Diesel")AND($Fuel<>"LPG")) {
$warning='Invalid value for fuel, please try again !';
//
// Check if the input value for the Color field is valid
} elseif (!preg_match("/^[a-zA-Z ]*$/",$Color)) {
$warning='Color field may contain only letters, please try again !';
//
// Check if the input value for the Year field is valid
} elseif (!filter_var($Year, FILTER_VALIDATE_INT)) {
$warning='Year field may contain only numbers, please try again !';
//
// Check if the input value for the Price field is valid
} elseif (!filter_var($Price, FILTER_VALIDATE_INT)) {
$warning='Price field may contain only numbers, please try again !';
//
// Check if the uploaded picture isn't larger than 500kb
} elseif ($_FILES['carpic']['size'] > 500000) {
$warning='!!! Sorry, your picture file is too large !!!';
//
// Check if the uploaded picture is an image
} elseif ((getimagesize($_FILES['carpic']['tmp_name'])) == false) {
$warning='!!! File is not an image !!!';
}
//
//Writes the car image file to the server, notify in case of write failure
elseif (!(move_uploaded_file($_FILES['carpic']['tmp_name'],$TargetFilePath))) {
// Show a warning on sell mycar page that picture upload failed
$warning="!!! Failed to load picture !!!";
create_sellmycarpage($Name,$sellmycarformstatus,$warning,$Make,$Model,$BodyType,$Color,$Year,$Fuel,$Price,$Pic);
exit;
} 
elseif ($warning == "") {
// If upload is successfull (no warning message) call datamodel for adding a car to the autoplanet database
$result=add_car($Make, $Model, $Color, $BodyType, $Year, $Fuel, $Price, $Name, $Email, $Pic);
}}
// Show a warning on sell my car page if car advert couldn't be written to database
if ($result == "Fail") {
$warning="Sorry, something went wrong, please try again later...";
}
// If everything OK show entered car advert on sell my car page
create_sellmycarpage($Name,$sellmycarformstatus,$warning,$Make,$Model,$BodyType,$Color,$Year,$Fuel,$Price,$Pic);
?>
