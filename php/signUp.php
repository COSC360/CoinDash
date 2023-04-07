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
    <title>CoinDash</title>
    <link rel="stylesheet" href="../font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/userAuth.css">
    <link rel="icon" href="../images/sitelogo.png" type="image/icon type">
    <script src="https://kit.fontawesome.com/e6e0351429.js" crossorigin="anonymous"></script>
    <script src="../js/navigation.js"></script>
</head>

<body>
    <?php
        include "dashboardHeader.php";
    ?>
    <main>
        <div class = "panel auth-container">
            <div class="register-info">
                <h1>Home/</h1>
                <h2>Sign Up</h2>
                <p>CoinDash is a cryptocurrency price tracking website that allows users to monitor the real-time prices of various cryptocurrencies. With its user-friendly interface and customizable alerts, CoinDash offers a convenient way for crypto enthusiasts and investors to stay up-to-date with the latest market trends</p>
                <div class="info-footer">
                    <p><a href="signIn.php">Already Have An Account?</a></p>
                    <p>or</p>
                    <p><a href="dashboard.php">Login as Guest</a></p>
                </div>
            </div>  
            <div class="register-box">
                <form name = "registerForm" id="registerForm" enctype="multipart/form-data" action= "processRegister.php" method="POST">
                    <div class="item-1">
                        <label>Username <span style="color: red;">*</span></label><br>
                        <i class="fa-sharp fa-solid fa-circle-xmark fa-bounce errorLogoRegister"></i>                            
                        <input type = "text" name = "username"  id = "username" placeholder="What Should We Call You?"  class = "required" onkeydown = "hideError(0)">
                        <p class="errorTextRegister"></p>
                    </div>

                    <div class="item-2">
                        <label>Email <span style="color: red;">*</span></label><br>
                        <i class="fa-sharp fa-solid fa-circle-xmark fa-bounce errorLogoRegister"></i>                       
                        <input type = "email" name = "email"  id = "email" placeholder="What's Your Email?" class = "required">
                        <p class="errorTextRegister"></p>
                    </div>

                    <div class="item-3">
                        <label>Password <span style="color: red;">*</span></label><br>
                        <i class="fa-sharp fa-solid fa-circle-xmark fa-bounce errorLogoRegister"></i>                                                        
                        <input type = "password" name = "password"  id = "password" placeholder="What’s Your Password?" class = "required" onkeydown = "hideError(1)">
                        <p class="errorTextRegister"></p>
                    </div>

                    <div class="item-4">
                        <label>Verify Password <span style="color: red;">*</span></label><br>
                        <i class="fa-sharp fa-solid fa-circle-xmark fa-bounce errorLogoRegister"></i>
                        <input type = "password" name = "verifyPassword"  id = "verifyPassword" placeholder="Confirm Password?" class = "required" onkeydown = "hideError(2)">
                        <p class="errorTextRegister"></p>
                    </div>

                    <div class="item-5">
                        <label>Coming From</label><br>
                        <select name="selectionMenu" id="selectionMenu">
                            <option value="Google"  selected="selected">Google</option>
                            <option value="Friend">Friend</option>
                            <option value="Yahoo">Yahoo</option>
                            <option value="Twitter">Twitter</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Online Adverstisement">Online Adverstisement</option>
                            <option value="Crypto Exchange">Crypto Exchange</option>
                        </select>
                    </div>

                    <div class="item-6">
                        <label>Profile Photo <span style="color: red;">*</span></label><br>
                        <i class="fa-sharp fa-solid fa-circle-xmark fa-bounce errorLogoRegister"></i>
                        <input type="file" name="img"  id="img" accept="image/*" class = "required" onkeydown = "hideError(3)">
                        <p class="errorTextRegister"></p>
                    </div>      

                    <div class="item-7">
                        <input type="reset" value="Reset Form">
                    </div>

                    <div class = "item-8">
                        <input type="submit"  name = "registerSubmit"  id = "registerSubmit" value="Get Started !" onkeydown = "hideError(4)">
                    </div>                    
                </form>
            </div>
        </div>
    </main>
    <?php
        include "footer.php";
    ?>
    <script src="../js/signUp.js"></script>
</body>

</html>