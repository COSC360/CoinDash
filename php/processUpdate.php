<?php
    include "modules.php";
    echo "Updated 1!";
    $errMsg = '';
    if(isset($_GET['updateSubmit']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        echo "Updated 2!";
        if(isset($_GET['email']) && isset($_GET['password'])){
            $userEmail= $_GET['email'];
            $userPassword = $_GET['password'];
            updateUser($con,$userEmail,$userPassword);
            echo "Updated 3!";
        }else{
            $errMsg = 'Login data was not sent. Please try again !';
            echo "<script>console.log(\"".$errMsg."\")</script>";
        }
    }else{
        $errMsg = 'Invalid Request Type !';
        echo "<script>console.log(\"".$errMsg."\")</script>";
    }

?>