<?php
    include "modules.php";
    
    $errMsg = '';

    if(isset($_POST['updateSubmit']) && $_SERVER["REQUEST_METHOD"] == "POST"){      
        if(isset($_POST['email']) && isset($_POST['password'])){
            $userEmail= $_POST['email'];
            $userPassword = md5($_POST['password']);
            updateUser($con,$userEmail,$userPassword);
            
        }else{
            $errMsg = 'Login data was not sent. Please try again !';
            echo "<script>console.log(\"".$errMsg."\")</script>";
        }
    }elseif(isset($_POST['enableUser']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['userID'])){
            $userID = $_POST['userID'];
            enableUser($con, $userID);
        }
    }elseif(isset($_POST['disableUser']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['userID'])){
            $userID = $_POST['userID'];
            disableUser($con, $userID);
        }
    }elseif(isset($_POST['deleteUser']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['userID'])){
            $userID = $_POST['userID'];
            deleteUser($con, $userID);
        }
    }elseif(isset($_POST['saveUser']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(isset($_POST['userID']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['userType']) && isset($_POST['status']) && isset($_POST['regTimestamp'])){

            $userID = $_POST['userID'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $comingFrom = $_POST['comingFrom'];
            $userType = $_POST['userType'];
            $status = $_POST['status'];
            $regTimestamp = $_POST['regTimestamp'];
            saveUser($con, $userID, $username, $password, $email, $comingFrom, $userType, $status,$regTimestamp);
        }
    }else{
        $errMsg = 'Invalid Request Type !';
        echo "<script>console.log(\"".$errMsg."\")</script>";
    }

?>