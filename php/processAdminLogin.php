<?php
    include "modules.php";
    $errMsg = '';
    
    if(isset($_GET['adminLogin']) && $_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['adminLoginID']) && isset($_GET['adminPassword'])){
            $adminLoginID= $_GET['adminLoginID'];
            $adminPassword = $_GET['adminPassword'];
            adminLogin($con,$adminLoginID,$adminPassword);
        }else{
            $errMsg = 'Login data was not sent. Please try again !';
            echo "<script>console.log(\"".$errMsg."\")</script>";
        }
    }else{
        $errMsg = 'Invalid Request Type !';
        echo "<script>console.log(\"".$errMsg."\")</script>";
    }
?>