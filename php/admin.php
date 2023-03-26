<?php
    seassion_start();

    if($_SESSION["userType"] == "user"){
        header('location:adminAuth.php');
    }elseif($_SESSION["userType"] == null){
        header('location:adminAuth.php');
    }else{
        echo "It works !"
    }
    //Add logic based on user type
?>