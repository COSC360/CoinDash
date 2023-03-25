<?php
include "DBconnection.php";
include "sql-queries.php";

echo "<script>console.log('Hello')</script>";
$userId = $_POST["userId"];
$dashboardJSON = $_POST["dashboardJSON"];
echo "<script>console.log('".$dashboardJSON."')</script>";
uploadDashboard($con, $userId, $dashboardJSON);
    
?>