<?php
include "DBconnection.php";
include "sql-queries.php";

$userId = $_POST["userId"];
$dashboardJSON = $_POST["dashboardJSON"];
echo "<script>console.log('".$dashboardJSON."')</script>";
uploadDashboard($con, $userId, $dashboardJSON);
    
?>