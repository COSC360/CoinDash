<?php
    seassion_start();

    if($_SESSION["userType"] == "user"){
        header('location:adminAuth.php');
    }else{
        echo "Admin works!"
    }
    //Add logic based on user type
?>