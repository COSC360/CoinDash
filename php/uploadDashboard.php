<?php
include "DBconnection.php";
include "sql-queries.php";

$userId = $_POST["userId"];
$dashboardJSON = $_POST["dashboardJSON"];

uploadDashboard($con, $userId, $dashboardJSON);
    
?>