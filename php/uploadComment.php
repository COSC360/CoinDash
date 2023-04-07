<?php
    session_start();
    include "DBconnection.php";
    include "sql-queries.php";

    $coinId = $_POST["coinId"];
    $text = $_POST["text"];
    echo $text;
    $parentId = isset($_POST["parentId"]) ? $_POST["parentId"] : null;

    $userId = $_SESSION["id"];
    echo $parentId;
    uploadComment($con, $userId, $coinId, $text, $parentId);
?>