<?php
    session_set_cookie_params(0);
    session_start();
    include "DBconnection.php";
    include "commentSQL.php";

    $coinId = $_POST["coinId"];
    $parentId = $_POST["parentId"];
    $text = $_POST["text"];

    $userId = $_SESSION["Id"];

    uploadComment($con, $userId, $coinId, $text, $parentId);
?>