<?php
echo "<script>console.log('hello4')</script>";
include "DBconnection.php";
echo "<script>console.log('hello6')</script>";
include "sql-queries.php";
echo "<script>console.log('hello3')</script>";
if (mysqli_connect_errno()){
    die(mysqli_connect_errno());
}

?>