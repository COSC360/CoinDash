<?php
    // $uri = $_SERVER['REQUEST_URI'];
    // echo $uri."<br>"; // Outputs: URI

    // $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
 
    // $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    // echo $url."<br>"; // Outputs: Full URL

    $query = $_SERVER['QUERY_STRING'];
    echo $query."<br>"; // Outputs: Query String
?>