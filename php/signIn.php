<?php
    session_start();
    if(isset($_SESSION['statusMsg'])){
        include 'alert.php';
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
    <link rel="stylesheet" href="../font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/userAuth.css">
    <link rel="stylesheet" href="../css/alert.css">
    <link rel="icon" href="../images/sitelogo.png" type="image/icon type">
    <script src="https://kit.fontawesome.com/e6e0351429.js" crossorigin="anonymous"></script>
    <script src="../js/navigation.js"></script>
    <title>CoinDash</title>
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
                        <p>CoinDash is a modularized cryptocurrency price tracking website with real-time prices, customizable alerts, and a user-friendly interface that provides tools and information for both experienced traders and newcomers.</p>
                        <div class="info-footer">
                            <p><a href="signUp.php">Don’t Have An Account?</a></p>
                            <p>or</p>
                            <p><a href="dashboard.php">Login as Guest</a></p>
                        </div>
                    </div>  
                    <div class="login-box">
                        <form name = "loginForm" id ="loginForm" action= "processLogin.php" method="POST">
                            <div class="item-1">
                                <label>Username or Email</label><br>
                                <i class="fa-sharp fa-solid fa-circle-xmark fa-bounce errorLogoLogin"></i>     
                                <input type = "text" name = "loginId" id= "loginId" placeholder="What’s Your Registered Username or Email?" class="required" onkeydown = "hideError(0)" />
                                <p class="errorTextLogin"></p>
                            </div>
                            <div class="item-2">
                                <label>Password</label><br>
                                <i class="fa-sharp fa-solid fa-circle-xmark fa-bounce errorLogoLogin"></i>
                                <input type = "password" name = "password" id= "password" placeholder="What’s Your Password?" class="required" onkeydown = "hideError(1)"/>
                                <p class="errorTextLogin"></p>
                            </div>
                            <div class="item-3">
                                <input type="reset" value="Reset Form" id="loginReset" />
                            </div>
                            <div class="item-4">
                                <input type="submit" name = "loginSubmit" id = "loginSubmit" value ="Login" />
                            </div>
                        </form>
                    </div>
                </div>
        </main>
    <?php
        include "footer.php";
        if(isset($_POST["errmsg"])){
            echo "<script>alert('".$_POST["errmsg"]."');</script>";
        }
    ?>
    <script src="../js/signIn.js"></script>
</body>

</html>