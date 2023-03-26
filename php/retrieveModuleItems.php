<?php

include "DBconnection.php";
include "sql-queries.php";

if (mysqli_connect_errno()){
    die(mysqli_connect_errno());
}

$fiat = $_POST["fiat"];
$category = "Ethereum Ecosystem";
$sort = $_POST["sort"];

$coins = retrieveCoinsByCategory($con, $fiat, $category, $sort, 12, 1);

echo json_encode($coins);
?>