<?php
// Search user in userdatabase
// Usage: search_user(Gebruikersnaam)
function search_user($X) {
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
//prepare select statement with variables
$sth = $conn->prepare("SELECT * FROM users WHERE Username = :Username");
// preparing the statement
// execute the statement with different values
$sth->bindParam(':Username', $X, PDO::PARAM_STR, 30);
$sth->execute();
$result=$sth->fetchAll();
return $result;
// Display error message in case of database error, close connection and exit script
}
catch(PDOException $e) {
pageheader(Error , '<a href=/index.php>Home</a>' );
show_message("Sorry, something went wrong... Please try again later.");
$conn = null;
exit();
}
}
?>