<?php
    session_set_cookie_params(0);
    session_start();
    include "DBconnection.php";
    include "sql-queries.php";

    $coinId = $_POST["coinId"];
    $text = $_POST["text"];
    $parentId = isset($_POST["parentId"]) ? $_POST["parentId"] : null;

    $userId = $_SESSION["id"];

    uploadComment($con, $userId, $coinId, $text, $parentId);
?>