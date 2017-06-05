<?php
// Add user to the userdatabase
// Usage: add_user(Name,Username,HashPW)
function add_user($X, $Y, $Z) {
// Fetch database credentials
$username = $_SERVER['DB_USER'];
$password = $_SERVER['DB_PASS'];
//
// Connect to database with PDO
$hostname = "localhost";
// Connect to database
try {
$conn = new PDO("mysql:host=$hostname;dbname=autodb", $username, $password);
// End PDO connection
//prepare select statement with parameters
$sth = $conn->prepare("INSERT INTO users (Name, Username, HashPW) VALUES (:Name, :Username, :HashPW)");
// Bind the statement parameters to the input variables
$sth->bindParam(':Name', $X, PDO::PARAM_STR, 30);
$sth->bindParam(':Username', $Y, PDO::PARAM_STR, 30);
$sth->bindParam(':HashPW', $Z, PDO::PARAM_STR, 100);
//execute the statement
$sth->execute();
$result="Registration completed, you can now login with your email and password !";
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