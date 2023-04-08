<?php
    session_start();
    include "DBconnection.php";
    include "sql-queries.php";

    $commentId = $_POST["commentId"];

    deleteComment($con, $commentId);
?>