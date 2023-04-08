<?php
    session_start();

    $rootPage = "Home";

    $_SESSION['breadcrumURL'] = $rootPage."/".$previousPage."/".$currentPage;
?>