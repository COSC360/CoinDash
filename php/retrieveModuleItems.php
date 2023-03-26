<?php

include "DBconnection.php";
include "sql-queries.php";

if (mysqli_connect_errno()){
    die(mysqli_connect_errno());
}

// $fiat = $_POST["fiat"];
// $category = $_POST["category"];
// $sort = $_POST["sort"];
$fiat = "usd";
$category = "Ethereum Ecosystem";
$sort = "price_change_24hr";

$coins = retrieveCoinsByCategory($con, $fiat, $category, $sort, 12, 1);

echo json_encode($coins);
?>