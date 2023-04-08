<?php
    session_start();

    // $rootPage = "Home";
    // $previousPage = "";
    // $currentPage = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

    // $_SESSION['breadcrumURL'] = $rootPage."/".$previousPage."/".$currentPage;

    echo $_SERVER["SCRIPT_NAME"];
    echo $_SERVER['HTTP_REFERER'];
?>