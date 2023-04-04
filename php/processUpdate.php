<?php
    include "modules.php";
    
    $errMsg = '';
    echo isset($_POST['enableUser']);
    echo isset($_POST['disableUser']);
    echo isset($_POST['deleteUser']);

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

    }elseif(isset($_POST['saveUser']) && $_SERVER["REQUEST_METHOD"] == "POST"){

    }else{
        $errMsg = 'Invalid Request Type !';
        echo "<script>console.log(\"".$errMsg."\")</script>";
    }

?>