<?php
    session_start();
    include "DBconnection.php";
    include "sql-queries.php";

    // $coinId = $_POST["coinId"];
    // $text = $_POST["text"];
    // $parentId = isset($_POST["parentId"]) ? $_POST["parentId"] : null;

    // $userId = $_SESSION["id"];

    $coinId = "axie-infinity";
    $text = "NEW COOOMENT";
    $parentId = 27;

    $userId = 5;
    uploadComment($con, $userId, $coinId, $text, $parentId);
?>