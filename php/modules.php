<?php
include "DBconnection.php";
include "sql-queries.php";
echo "<script>console.log('hello3')</script>";
if (mysqli_connect_errno()){
    die(mysqli_connect_errno());
}

?>