<?php
// add car to the autoplanet database
// Usage: add_car(Make, Bodytype, Fuel)
function add_car($Make, $Model, $Color, $BodyType, $Year, $Fuel, $Price, $Name, $Email, $Pic) {
//
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
$sth = $conn->prepare("INSERT INTO autoplanet (Make, Model, Color, BodyType, Year, Fuel, Price, Name, Email, Pic) VALUES (:Make, :Model, :Color, :BodyType, :Year, :Fuel, :Price, :Name, :Email, :Pic)");
// Bind the statement parameters to the input variables
$sth->bindParam(':Make', $Make, PDO::PARAM_STR, 30);
$sth->bindParam(':Model', $Model, PDO::PARAM_STR, 30);
$sth->bindParam(':Color', $Color, PDO::PARAM_STR, 30);
$sth->bindParam(':BodyType', $BodyType, PDO::PARAM_STR, 30);
$sth->bindParam(':Year', $Year, PDO::PARAM_STR, 30);
$sth->bindParam(':Fuel', $Fuel, PDO::PARAM_STR, 30);
$sth->bindParam(':Price', $Price, PDO::PARAM_STR, 30);
$sth->bindParam(':Name', $Name, PDO::PARAM_STR, 30);
$sth->bindParam(':Email', $Email, PDO::PARAM_STR, 30);
$sth->bindParam(':Pic', $Pic, PDO::PARAM_STR, 100);
//execute the statement
$sth->execute();
if ($sth->rowCount() > 0) {
return "OK";
}
return "Fail";
}
// Display error message in case of database error, close connection and exit script
catch(PDOException $e) {
show_message("Sorry, something went wrong... Please try again later.");
$conn = null;
exit();
}
}
?>
