<?php
// Usage: check_authorisation(role)
function check_authorisation($role) {
// Run authorisation check for autoplanet users
if ($role=="anonymous") {
// Do nothing - No authorization check needed
}	
if ($role=="autoplanetuser") {
// Check if user is authorised (logged in) to access this page
if(empty( $_SESSION['user_id'])) {
// If user isn't logged in show message that he needs to login to access this page
show_message("You need to login to access this page !");
exit();
}}}
?>
