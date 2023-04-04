<?php
    include "modules.php";
    $errMsg = '';
    echo "ON LOGIN PAGE";
    if(isset($_GET['loginSubmit']) && $_SERVER["REQUEST_METHOD"] == "GET"){
        echo "INSIDE LOOP 1";
        if(isset($_GET['loginId']) && isset($_GET['password'])){
            echo "INSIDE LOOP 2";
            $loginID= $_GET['loginId'];
            $loginPassword = $_GET['password'];
            loginUser($con,$loginID,$loginPassword);
        }else{
            echo "FAILED LOOP 2";
            $errMsg = 'Login data was not sent. Please try again !';
            echo "<script>console.log(\"".$errMsg."\")</script>";
        }
    }else{
        echo "FAILED LOOP 1";
        $errMsg = 'Invalid Request Type !';
        echo "<script>console.log(\"".$errMsg."\")</script>";
    }
?>