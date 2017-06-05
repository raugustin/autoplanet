<?php
// delete car from the autoplanet database
// Usage: delete_car(Index, Name, Email)
function delete_car($Index, $Name, $Email) {
// Fetch database credentials
$username = $_SERVER['DB_USER'];
$password = $_SERVER['DB_PASS'];
// Connect to database with PDO
$hostname = "localhost";
// Connect to database
try {
$conn = new PDO("mysql:host=$hostname;dbname=autodb", $username, $password);
// End PDO connection
//prepare select statement with parameters
$sth = $conn->prepare("DELETE FROM autoplanet WHERE ID = :ID AND Name = :Name AND Email = :Email");
// Bind the statement parameters to the input variables
$sth->bindParam(':ID', $Index, PDO::PARAM_INT, 11);
$sth->bindParam(':Name', $Name, PDO::PARAM_STR, 30);
$sth->bindParam(':Email', $Email, PDO::PARAM_STR, 30);
//execute the statement
$sth->execute();
if ($sth->rowCount() > 0) {
return "Selected car advert has been deleted<br><br>Returning to myautoplanet within 5 seconds...";
}
return "Selected car ad couldn't be deleted !<br><br>Returning to myautoplanet within 5 seconds...";
}
// Display error message in case of database error, close connection and exit script
catch(PDOException $e) {
show_message("Sorry, something went wrong... Please try again later.");
$conn = null;
exit();
}
}
?>
