<?php
$Get_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$parts=(parse_url($Get_url));
$params=explode("/", ($parts["path"]));
$controller="/var/www/html/autoplanet/application/controllers/".$params[1].".php";
if (($Get_url=="https://www.autoplanet.nu/") OR ($Get_url=="https://www.autoplanet.nu/home")) {   
require_once('/var/www/html/autoplanet/application/controllers/searchcar.php');}
if (file_exists($controller)) {
require_once($controller); }
else { 
require_once('/var/www/html/autoplanet/application/controllers/searchcar.php');
}
?>
