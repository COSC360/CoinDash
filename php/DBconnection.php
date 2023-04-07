<?php
// Database configuration  
// $dbHost     = "cosc360.ok.ubc.ca";  
// $dbUsername = "83864363";  
// $dbPassword = "83864363";  
// $dbName     = "db_83864363";
require_once realpath(__DIR__."/vendor/autoload.php"); 

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$dbHost     = getenv("DB_HOST");  
$dbUsername = getenv("DB_USERNAME");  
$dbPassword = getenv("DB_PASSWORD"); 
$dbName     = getenv("DB_NAME");

echo $dbHost;
// Create database connection  
$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

$error = mysqli_connect_error();
  
if ($error != null){
    die(mysqli_connect_errno());
}

?>