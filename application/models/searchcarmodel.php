<?php
// search car in database
// Usage: search_car(Make, Bodytype, Fuel)
function search_car($X,$Y,$Z) {
// Fetch database credentials
$username = $_SERVER['DB_USER_AN'];
$password = $_SERVER['DB_PASS_AN'];
// Connect to database with PDO
$hostname = "localhost";
// Connect to database
try {
$conn = new PDO("mysql:host=$hostname;dbname=autodb", $username, $password);
// End PDO connection
//prepare select statement with variables
$sth = $conn->prepare("SELECT * FROM autoplanet WHERE Make = :Make AND BodyType LIKE :BodyType AND Fuel LIKE :Fuel");
//preparing the statement
//execute the statement with different values
$sth->bindParam(':Make', $X, PDO::PARAM_STR, 30);
$sth->bindParam(':BodyType', $Y, PDO::PARAM_STR, 30);
$sth->bindParam(':Fuel', $Z, PDO::PARAM_STR, 30);
$sth->execute();
$result=$sth->fetchAll();
return $result;
// Display error message in case of database error, close connection and exit script
}
catch(PDOException $e) {
show_message("Sorry, something went wrong... Please try again later.");
// Uncomment line below if you need detailed error messages for debugging purposes
// show_message($e);
$conn = null;
exit();
}
}
?>
