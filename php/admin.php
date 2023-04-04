<?php
    session_start();
    if($_SESSION['userType'] == "user" || $_SESSION['id'] == null){
        header('location:adminlogin.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/admin.js"></script>
    <title>Admin</title>
</head>
    <body>
        <?php
            include "dashboardHeader.php";
        ?>
        <main>
            <div class="tabswitcher">
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'byUsername')" id="defaultOpen">By Username</button>
                    <button class="tablinks" onclick="openCity(event, 'byEmail')">By Email ID</button>
                    <button class="tablinks" onclick="openCity(event, 'byCommentId')">By Comment ID</button>
                </div>

                <div id="byUsername" class="tabcontent">
                    <form class="example" action="processUserInfo.php" method = "POST">
                        <input type="text" placeholder="Search by username . . ." name="searchName">
                        <button type="submit" name="submitName"><i class="fa fa-search"></i></button>
                    </form>
                    <?php include 'userInfoDisplay.php';?>
                </div>

                <div id="byEmail" class="tabcontent">
                    <form class="example" action="processUserInfo.php" method = "POST">
                        <input type="text" placeholder="Search by email . . ." name="searchEmail">
                        <button type="submit"  name="submitEmail"><i class="fa fa-search"></i></button>
                    </form>
                    <?php include 'userInfoDisplay.php';?>
                </div>

                <div id="byCommentId" class="tabcontent">
                    <form class="example" action="processUserInfo.php" method = "POST">
                        <input type="text" placeholder="Search by comment Id . . ." name="searchCommentId">
                        <button type="submit"  name="submitCommentId"><i class="fa fa-search"></i></button>
                    </form>
                    <?php include 'userInfoDisplay.php';?>
                </div>
            </div>
            <script>
                // Get the element with id="defaultOpen" and click on it
                document.getElementById("defaultOpen").click();
            </script>
        </main>    
    </body>
</html> 
