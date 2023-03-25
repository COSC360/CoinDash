<?php
include "DBconnection.php";
include "sql-queries.php";

if (mysqli_connect_errno()){
    die(mysqli_connect_errno());
}

$data = retrieveAllCoins($con);

print_r($data);

?>