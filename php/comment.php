<?php
    session_start();
    include "DBconnection.php";
    include "commentSQL.php";

    $coinId = $_POST["coinId"];
    $parentId = $_POST["parentId"];
    $text = $_POST["text"];

    $userId = 1;
    echo "Hello";
    uploadComment($con, $userId, $coinId, $text, $parentId);
?>