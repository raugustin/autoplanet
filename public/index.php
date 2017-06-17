<?php
// Maps URL path to controller 
// Extract path from URL
$Get_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$parts=(parse_url($Get_url));
$params=explode("/", ($parts["path"]));
// Make controller file name based on URL path
$controller="/var/www/html/autoplanet/application/controllers/".$params[1].".php";
if (($Get_url=="https://www.autoplanet.nu/") OR ($Get_url=="https://www.autoplanet.nu/home")) {   
require_once('/var/www/html/autoplanet/application/controllers/searchcar.php');}
if (file_exists($controller)) {
// If URL path matches with a controller load this controller
require_once($controller); }
else { 
// Load home page if URL path doesn't match with a controller
require_once('/var/www/html/autoplanet/application/controllers/searchcar.php');
}
?>
