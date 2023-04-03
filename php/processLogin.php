<?php
        include "modules.php";
        $errMsg = '';
        echo isset($_GET['password']);
        echo isset($_GET['loginId']);
        echo isset($_GET['loginSubmit']);
        if(isset($_GET['loginSubmit']) && $_SERVER["REQUEST_METHOD"] == "GET"){
            if(isset($_GET['loginId']) && isset($_GET['password'])){
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