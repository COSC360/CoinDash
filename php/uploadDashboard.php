<?php
session_start();
include "DBconnection.php";
include "sql-queries.php";

$userId = $_SESSION["id"];
$dashboardJSON = $_POST["dashboardJSON"];
echo $userId;
echo $dashboardJSON;
uploadDashboard($con, $userId, $dashboardJSON);
    
?>