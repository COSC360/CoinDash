<?php
    include "modules.php";
    
    $errMsg = '';

    if(isset($_POST['submitName']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['searchName'])){
            $searchName = $_POST['searchName'];
            searchByUsername($con,$searchName);
        }else{
            $errMsg = 'Login data was not sent. Please try again !';
            echo "<script>console.log(\"".$errMsg."\")</script>";
        }
    }

    if(isset($_POST['submitEmail']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['searchEmail'])){
            $searchEmail = $_POST['searchEmail'];
            searchByEmail($con,$searchEmail);
        }else{
            $errMsg = 'Login data was not sent. Please try again !';
            echo "<script>console.log(\"".$errMsg."\")</script>";
        }
    }
    
    if(isset($_POST['submitCommentId']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['searchCommentId'])){
            $searchCommentId = $_POST['searchCommentId'];
            searchByCommentId($con, $searchCommentId);
        }else{
            $errMsg = 'Login data was not sent. Please try again !';
            echo "<script>console.log(\"".$errMsg."\")</script>";
        }
    }
?>