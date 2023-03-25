<?php
include "DBconnection.php";
include "sql-queries.php";

if (mysqli_connect_errno()){
    die(mysqli_connect_errno());
}

$data = retrieveAllCoins($con);
<<<<<<< HEAD
echo $data;
=======
>>>>>>> 5788d4b0af1b65b8d746450def6bede8ec381f9c

?>