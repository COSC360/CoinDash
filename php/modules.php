<?php
include "DBconnection.php";
include "sql-queries.php";

if (mysqli_connect_errno()){
    die(mysqli_connect_errno());
}

$fiatLabels = array("US Dollar", "Canadian Dollar", "Euro", "Philippine Peso", "Japanese Yen");
$fiats = array("usd", "cad", "eur", "php", "jpy");
$sortLabels = array( "7D: High To Low", "7D: Low To High", "14D: High To Low", "14D: Low To High", 
                "30D: High To Low", "30D: Low To High", "60D: High To Low", "60D: Low To High",
                "200D: High To Low", "200D: Low To High", "1YR: High To Low", "1YR: Low To High");
$sortValues = array( "price_change_7d", "price_change_7d DESC", "price_change_14d", "price_change_14d DESC",
                "price_change_30", "price_change_30 DESC", "price_change_60d", "price_change_60d DESC",
                "price_change_200", "price_change_200 DESC", "price_change_1yr", "price_change_1yr DESC");
?>