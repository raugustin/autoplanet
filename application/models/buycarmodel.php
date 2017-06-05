<?php
// Get seller name & email from autoplanet database
// Usage: Get_Seller_Contact_Details(Index)
function Get_Seller_Car_Details($Index) {
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
$sth = $conn->prepare("SELECT * FROM autoplanet WHERE ID = :ID");
// Bind the statement parameters to the input variables
$sth->bindParam(':ID', $Index, PDO::PARAM_INT, 11);
//execute the statement
$sth->execute();
// Fetch single row
$result=$sth->fetch();
return $result;
// Display error message in case of database error, close connection and exit script
}
catch(PDOException $e) {
show_message("Sorry, something went wrong... Please try again later.");
$conn = null;
exit();
}
}
?>