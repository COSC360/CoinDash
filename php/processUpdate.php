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
        if(isset($_POST['userID']) && isset($_POST['username']) && isset($_POST['userpassword']) && isset($_POST['email']) && isset($_POST['comingFrom']) && isset($_POST['userType']) && isset($_POST['status']) && isset($_POST['regTimestamp'])){
            $userID
            $username
            $password
            $email
            $comingFrom
            $userType
            $status
        }
    }else{
        $errMsg = 'Invalid Request Type !';
        echo "<script>console.log(\"".$errMsg."\")</script>";
    }

?>