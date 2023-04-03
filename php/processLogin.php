<?php
        include "modules.php";
        $errMsg = '';
        echo isset($_GET['loginSubmit']);
        if(isset($_GET['loginSubmit']) && $_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET['loginID']) && isset($_GET['loginPassword'])){
                $loginID= $_GET['loginId'];
                $loginPassword = $_GET['password'];
                loginUser($con,$loginID,$loginPassword);
            }else{
                $errMsg = 'Login data was not sent. Please try again !';
                echo "<script>console.log(\"".$errMsg."\")</script>";
            }
        }else{
            $errMsg = 'Invalid Request Type !';
            echo "<script>console.log(\"".$errMsg."\")</script>";
        }
    ?>