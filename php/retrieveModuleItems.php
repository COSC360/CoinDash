<?php

include "DBconnection.php";
include "sql-queries.php";

if (mysqli_connect_errno()){
    die(mysqli_connect_errno());
}

$fiat = $_POST["fiat"];
$category = $_POST["category"];
$sort = $_POST["sort"];
echo "Hello";
$coins = retrieveCoinsByCategory($con, $fiat, $category, $sort, 10, 1);
// $coins = retrieveAllCoins($con);
echo "Hello";
echo json_encode($coins);
?>