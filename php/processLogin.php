<?php
    include "modules.php";
    $errMsg = '';
    
    if(isset($_POST['loginSubmit']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['loginId']) && isset($_POST['password'])){
            $loginID= $_POST['loginId'];
            $loginPassword = $_POST['password'];
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