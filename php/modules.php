<?php
include "DBconnection.php";
include "sql-queries.php";

if (mysqli_connect_errno()){
    die(mysqli_connect_errno());
}

echo "1";
$data = retrieveDashboard($con, 1);
echo "1";
?>