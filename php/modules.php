<?php
include "DBconnection.php";
include "sql-queries.php";

if (mysqli_connect_errno()){
    die(mysqli_connect_errno());
}

echo "<script>console.log('hi');</script>";
$data = retrieveDashboard($con, 1);
echo "<script>console.log('hi');</script>";
?>