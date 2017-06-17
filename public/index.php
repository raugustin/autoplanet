<?php
// Maps URL path to controller 
// Extract path from URL
$Get_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$parts=(parse_url($Get_url));
$params=explode("/", ($parts["path"]));
// Compose controller file name based on URL path
$controller="/var/www/html/autoplanet/application/controllers/".$params[1].".php";
if (($Get_url=="https://www.autoplanet.nu/") OR ($Get_url=="https://www.autoplanet.nu/home")) {   
require_once('/var/www/html/autoplanet/application/controllers/searchcar.php');}
// Load controller if the URL path matches with a controller name
if (file_exists($controller)) {
require_once($controller); }
else { 
// Load home page if URL path doesn't match with a controller
require_once('/var/www/html/autoplanet/application/controllers/searchcar.php');
}
?>
