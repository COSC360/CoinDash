<?php
    include "modules.php";
    
    $errMsg = '';
    if(isset($_POST['updateSubmit']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(isset($_POST['email']) && isset($_POST['password'])){
            $userEmail= $_POST['email'];
            $userPassword = $_POST['password'];
            updateUser($con,$userEmail,$userPassword);
            
        }else{
            $errMsg = 'Login data was not sent. Please try again !';
            echo "<script>console.log(\"".$errMsg."\")</script>";
        }
    }else{
        $errMsg = 'Invalid Request Type !';
        echo "<script>console.log(\"".$errMsg."\")</script>";
    }

?>