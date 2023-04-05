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
                    <button class="tablinks" onclick="openCity(event, 'byUsername')" id ="defaultUsername">By Username</button>
                    <button class="tablinks" onclick="openCity(event, 'byEmail')" id ="defaultEmail">By Email ID</button>
                    <button class="tablinks" onclick="openCity(event, 'byCommentId')" id ="defaultCommentId">By Comment ID</button>
                </div>

                <div id="byUsername" class="tabcontent">
                    <form class="example" action="processUserInfo.php" method = "POST">
                        <input type="text" placeholder="Search by username . . ." name="searchName">
                        <button type="submit" name="submitName" id="submitName"><i class="fa fa-search"></i></button>
                    </form>
                    <?php include "userInfoDisplay.php";?>
                </div>

                <div id="byEmail" class="tabcontent">
                    <form class="example" action="processUserInfo.php" method = "POST">
                        <input type="text" placeholder="Search by email . . ." name="searchEmail">
                        <button type="submit"  name="submitEmail" id="submitEmail"><i class="fa fa-search"></i></button>
                    </form>
                    <?php include 'userInfoDisplay.php';?>
                </div>

                <div id="byCommentId" class="tabcontent">
                    <form class="example" action="processUserInfo.php" method = "POST">
                        <input type="text" placeholder="Search by comment Id . . ." name="searchCommentId">
                        <button type="submit"  name="submitCommentId" id="submitCommentId"><i class="fa fa-search"></i></button>
                    </form>
                    <?php include 'userInfoDisplay.php';?>
                </div>
            </div>
            <script>
                const infoDisplayForm = document.forms;
               
                for(var i = 2; i <= 6; i = i + 2){
                    document.getElementById(infoDisplayForm[i][0].getAttribute("id")).addEventListener("click", enableField);

                    for(var j = 0; j < infoDisplayForm[i].length; j++){
                        infoDisplayForm[i][j].disabled = true;
                    }
                    
                    function enableField(){
                        for(var j = 0; j < infoDisplayForm.length; j++){
                            infoDisplayForm[i][j].disabled = false;
                        }
                        document.getElementById(infoDisplayForm[i][0].getAttribute("id")).setAttribute("style", "background-color: #2fc363;");
                        document.getElementById(infoDisplayForm[i][1].getAttribute("id")).setAttribute("style", "background-color: #2fc363;");
                        document.getElementById(infoDisplayForm[i][2].getAttribute("id")).setAttribute("style", "background-color: #2fc363;");
                        document.getElementById(infoDisplayForm[i][3].getAttribute("id")).setAttribute("style", "background-color: #2fc363;");
                    }
                }

                document.getElementById("<?php echo $_SESSION['defaultTabID']?>").click();
            </script>
        </main>    
    </body>
</html> 
