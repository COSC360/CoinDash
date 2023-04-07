<?php
session_start();
include "DBconnection.php";
include "sql-queries.php";

echo "<script>console.log('Check')</script>";
$userId = $_SESSION["Id"];
$dashboardJSON = $_POST["dashboardJSON"];
echo "<script>console.log('Check')</script>";
uploadDashboard($con, $userId, $dashboardJSON);
    
?>