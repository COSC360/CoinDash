<?php
    session_start();
    if($_SESSION['userType'] == "user" || !isset($_SESSION['id'])){
        header('location:adminlogin.php');
    }

    if(isset($_SESSION['adminStatusMsg'])){
        echo "<script>window.alert(\"".$_SESSION['adminStatusMsg']."\")</script>";
        unset($_SESSION['adminStatusMsg']);
    }

    if(!isset($_SESSION['defaultTabID'])){
        $_SESSION['defaultTabID'] = "defaultUsername";
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
    <link rel="icon" href="../images/sitelogo.png" type="image/icon type">
    <script src="../js/admin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <title>CoinDash | Admin Portal</title>
</head>
    <body>
        <?php
            include "dashboardHeader.php";
        ?>
        <main>
            <div class="panel adjust-container">
                <div class="tabswitcher">
                    <div class="tab">
                        <button class="tablinks" onclick="openCity(event, 'byUsername')" id ="defaultUsername">By Username</button>
                        <button class="tablinks" onclick="openCity(event, 'byEmail')" id ="defaultEmail">By Email ID</button>
                        <button class="tablinks" onclick="openCity(event, 'byCommentId')" id ="defaultCommentId">By Comment ID</button>
                    </div>

                    <div id="byUsername" class="tabcontent">
                        <form class="example" action="processUserInfo.php" method = "POST">
                            <input type="text" placeholder="Search by username . . ." name="searchName">
                            <button type="submit" name="submitName" id="submitName"><i class="fa fa-search"></i></button>
                        </form>
                        <?php
                            $_SESSION['formID'] = "displayByName"; 
                            include "userInfoDisplay.php";
                        ?>
                    </div>

                    <div id="byEmail" class="tabcontent">
                        <form class="example" action="processUserInfo.php" method = "POST">
                            <input type="text" placeholder="Search by email . . ." name="searchEmail">
                            <button type="submit"  name="submitEmail" id="submitEmail"><i class="fa fa-search"></i></button>
                        </form>
                        <?php 
                            $_SESSION['formID'] = "displayByEmail";
                            include "userInfoDisplay.php";
                        ?>
                    </div>

                    <div id="byCommentId" class="tabcontent">
                        <form class="example" action="processUserInfo.php" method = "POST">
                            <input type="text" placeholder="Search by comment Id . . ." name="searchCommentId">
                            <button type="submit"  name="submitCommentId" id="submitCommentId"><i class="fa fa-search"></i></button>
                        </form>
                        <?php 
                            $_SESSION['formID'] = "displayByCommentId";
                            include "userInfoDisplay.php";
                        ?>
                    </div>
                </div>
                <div class = "commentData">
                </div>
            </div>
            <script src="../js/adminFormHandler.js"></script>
            <script>
                document.getElementById("<?php echo $_SESSION['defaultTabID']?>").click();
            </script>

        </main>    
    </body>
</html> 
