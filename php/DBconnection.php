<?php
// Database configuration  
$dbHost     = "cosc360.ok.ubc.ca";  
$dbUsername = "83864363";  
$dbPassword = "83864363";  
$dbName     = "db_83864363";

// Create database connection  
$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

$error = mysqli_connect_error();
  
if ($error != null){
    die(mysqli_connect_errno());
}

?>