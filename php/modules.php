<?php
include "DBconnection.php";
include "sql-queries.php";

echo "Worked 1";

if (mysqli_connect_errno()){
    die(mysqli_connect_errno());
}

$data = retrieveAllCoins($con);
echo "Worked 2";
echo $data;

?>