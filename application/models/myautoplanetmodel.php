<?php
// search cars of an user in database
// Usage: show_mycars(Name, Email)
function show_mycars($X,$Y) {
// Fetch database credentials
$username = $_SERVER['DB_USER'];
$password = $_SERVER['DB_PASS'];
// Connect to database with PDO
$hostname = "localhost";
// Connect to database
try {
$conn = new PDO("mysql:host=$hostname;dbname=autodb", $username, $password);
// End PDO connection
//prepare select statement with variables
$sth = $conn->prepare("SELECT * FROM autoplanet WHERE Name = :Name AND Email = :Email");
//preparing the statement
//execute the statement with different values
$sth->bindParam(':Name', $X, PDO::PARAM_STR, 30);
$sth->bindParam(':Email', $Y, PDO::PARAM_STR, 30);
$sth->execute();
$result=$sth->fetchAll();
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