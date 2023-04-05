<?php
    session_start();
    if(isset($_SESSION['statusMsg'])){
        echo "<script>window.alert(\"".$_SESSION['statusMsg']."\")</script>";
        session_destroy();
    }else{
        session_destroy();
    }
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 360</title>
    <link rel="stylesheet" href="../font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/userAuth.css">
    <script src="https://kit.fontawesome.com/e6e0351429.js" crossorigin="anonymous"></script>
    <script src="../js/signIn.js"></script>
    <script src="../js/navigation.js"></script>
</head>

<body>
    <?php
        include "dashboardHeader.php";
    ?>
        <main>  
            <div class="main">
                <div class = "panel auth-container">
                    <div class="login-info">
                        <h1>Home/</h1>
                        <h2>Sign In</h2>
                        <p>Lorem ipsum dolor sit amet consectetur. Erat facilisi varius est cursus. Neque sagittis mi non purus semper lacus mauris magnis.</p>
                        <div class="info-footer">
                            <p><a onclick = "navigateToSignUp()">Don’t Have An Account?</a></p>
                            <p>or</p>
                            <p><a onclick = "navigateToCommunity()">Explore Dashboards?</a></p>
                        </div>
                    </div>  
                    <div class="login-box">
                        <form name = "LoginForm" id ="LoginForm" action= "processLogin.php" onsubmit="validateLoginForm()" method="GET" required>
                            <div class="item-1">
                                <label>Username or Email</label><br>     
                                <input type = "text" name = "loginId" id= "loginId" placeholder="What’s Your Registered Username or Email?">
                            </div>
                            <div class="item-2">
                                <label>Password</label><br>
                                <input type = "password" name = "password" id= "password" placeholder="What’s Your Password?">
                                
                            </div>
                            <div class="item-3">
                                <input type="reset" value="Reset Form">
                            </div>
                            <div class="item-4">
                                <input type="submit" name = "loginSubmit" id = "loginSubmit" value ="Login">
                            </div>
                        </form>
                    </div>
                </div>
                <div class = "display-card-container">
                    <div class = "display-card-grid">
                        <!-- <a href = "http://cosc360.ok.ubc.ca/suyash06/cosc360-Project/dashboard.php"><img class="dashboardCard"></a>
                        <a href = "http://cosc360.ok.ubc.ca/suyash06/cosc360-Project/dashboard.php"><img class="dashboardCard"></a>
                        <a href = "http://cosc360.ok.ubc.ca/suyash06/cosc360-Project/dashboard.php"><img class="dashboardCard"></a> -->
                        <!-- <a href = "http://localhost/project360/dashboard.php"><img class="dashboardCard"></a>
                        <a href = "http://localhost/project360/dashboard.php"><img class="dashboardCard"></a> -->
                    </div>
                </div>
        </main>
    <?php
        include "footer.php";
        if(isset($_GET["errmsg"])){
            echo "<script>alert('".$_GET["errmsg"]."');</script>";
        }
    ?>
</body>

</html>