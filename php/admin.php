<?php
    session_start();

    if($_SESSION["userType"] == "user"){
        header('location:adminAuth.php');
    }elseif($_SESSION["userType"] == null){
        header('location:adminAuth.php');
    }else{
        echo "ou've landed on the admin page !"
    }
    //Add logic based on user type
    
?>