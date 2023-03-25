<?php
session_start();

$email= $_POST['email'];
$password = $_POST['password'];
// if ($con->connect_error) {
//     die("Connection failed: " . $con->connect_error);
// }else{
//     $stmt = $con->prepare("UPDATE user_auth SET Email = ? WHERE Id = ?");
//     $stmt->bind_param("si", $email,$_SESSION["Id"]); 
//     $stmt->execute();
//     echo "Update Executed !";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link rel="stylesheet" href="font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="css/var.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="stylesheet" href="css/module.css">
    <link rel="stylesheet" href="css/userAuth.css">
    <link rel="stylesheet" href="css/account.css">
    <script src="js/signIn.js"></script>
    <script src="js/signUp.js"></script>
    <script src="js/account.js"></script>
</head>
<body>
<div class="main-container">
        <header class="header-container">
            <div class="logo">
                <img src="images/sitelogo.png" style="float: left;">
            </div>
            <nav>
                <a href="#">Community</a>
                <a href="#">Help</a>
            </nav>
            <div class="settings container">
                <div class="horizontal-container fit-width" style="margin-right: 2em;">
                    <p>English-US</p>
                    <img src="images/canada-flag.png">
                    <img src="svgs/arrow-down.svg">
                </div>
                <div class="horizontal-container fit-width">
                    <p>Sign In / Sign Up</p>
                </div>
            </div>
        </header>
        <div class = "user-account-container">
            <div class="user-account-info">
                <h2>Account Settings</h2>
                <p>Lorem ipsum dolor sit amet consectetur. Erat facilisi varius est cursus. Neque sagittis mi non purus semper lacus mauris magnis.</p>
            </div>  
            <div class="user-account-box">
                <div class="profile-box">
                    <div id="centered">Upload<br>Photo</div>
                    <?php echo '<img src="data:image/;base64,'. base64_encode($_SESSION['pfp']) .'" />';?>
                    <h1>Username</p>
                    <h2><?php echo $_SESSION["user"] ;?></h2>
                </div>
                <form action= "" method="POST">
                    <div class="item-1">
                        <label>Email</label><br>    
                        <div class="input-container">
                            <input type = "text" id="email" name = "email" value = "<?php echo $_SESSION["email"] ;?>">
                            <button class="editField" onclick="editField()"><img src="svgs/editField.svg"></button>
                        </div> 
                    </div>
                    <div class="item-2">
                        <label>Password</label><br>
                        <div class="input-container">
                            <input type = "password" id="password" name = "password">
                            <button class="editField" onclick="editField()"><img src="svgs/editField.svg"></button>
                        </div>
                    </div>
                    <div class="item-3">
                        <input type="reset" value="Reset Form">
                    </div>
                    <div class="item-4">
                        <input type="submit" value="Confirm Changes">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>