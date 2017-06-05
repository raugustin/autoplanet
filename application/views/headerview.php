<?php
// Generate html for header of a page
// Usage: pageheader(pagetitle, session/nosession)
function page_header($pagetitle,$sessionstatus) {
echo "<!DOCTYPE html>
<html>
<head>
<title>";
echo $pagetitle;
echo "
</title>
<link rel='shortcut icon' href='/images/autoworld.ico'>
<link rel='stylesheet' type='text/css' href='/css/style.css'>
</head>
<body>
<!-- Autoworld banner -->
<div class='header'>
<img style='width: 100%; height: 200px;' src='/images/AutoPlanet.jpg'>
</div>
<!-- Container for navigation bar -->
<nav>
    <ul>";
if ($sessionstatus<>0) {
echo "
        <li><a href=/home>Home</a></li>
        <li><a href=/sellmycar>Sell car</a></li>
        <li><a href=/myautoplanet>My autoplanet</a>/li>
        <li><a href=/logout>Logout</a></li>";
}
else {
echo "
        <li><a href=/home>Home</a></li>
        <li><a href=/login>Login</a></li>
        <li><a href=/registration>Register</a></li>
        <li><a href=/logout>Logout</a></li>";
}
echo "
    </ul>
</nav>";
}
?>
