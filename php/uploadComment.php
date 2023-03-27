<?php
    session_set_cookie_params(0);
    session_start();
    include "DBconnection.php";
    include "commentSQL.php";

    $coinId = $_POST["coinId"];
    $text = $_POST["text"];

    // TODO:
    // $userId = $_SESSION["Id"];
    $userId = 1;

    uploadComment($con, $userId, $coinId, $text);
?>