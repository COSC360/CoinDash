<?php
session_start();
// error_reporting(E_ALL);
// init_set('display_errors','1');
// include_once('ValidationResult.class.php');


include 'DBconnection.php';
    $userOremail= "test";
    $password = "test";

    $statusMsg = '';


    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }else{
        $stmt = $con->prepare("SELECT * FROM `user_auth` WHERE  `Email` = ? && `Password` = ? || `Username` = ? && `Password` = ? ");
        $stmt->bind_param("ssss", $userOremail,$password,$userOremail,$password); 
        $stmt->execute();
        $resultSet = $stmt->get_result(); // get the mysqli result
        $result = $resultSet->fetch_assoc();

        if($result != null){
            if($result['userType'] == 'admin'){
                header('location:admin.php');

            }elseif($result['userType'] == 'user'){
                header('location:account.php');
            }
        }else{
            $statusMsg = 'User does not exist !';
        }
    }

    $_SESSION["user"] = $_GET['user-email'];
    $_SESSION["email"] = $result['Email'];
    $_SESSION["Id"] = $result['Id'];
    $_SESSION["pfp"] = $result['profilePicture'];
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 360</title>
    <link rel="stylesheet" href="font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/userAuth.css">
    <script src="https://kit.fontawesome.com/e6e0351429.js" crossorigin="anonymous"></script>
    <script src="../js/signIn.js"></script>
    <script src="../js/signUp.js"></script>
</head>

<body>
<?php include 'header.php';?>
<main>  
    <div class="main">
        <div class = "auth-container">
            <div class="login-info">
                <h1>Home/</h1>
                <?php echo '<img src="data:image/*;base64,'.base64_encode($_SESSION["pfp"]).'" />';?>
                <h2>Sign In</h2>
                <p>Lorem ipsum dolor sit amet consectetur. Erat facilisi varius est cursus. Neque sagittis mi non purus semper lacus mauris magnis.</p>
                <div class="info-footer">
                    <p><a href="https://cosc360.ok.ubc.ca/suyash06/project-JasonR24/php/signUp.php">Don’t Have An Account?</a></p>
                    <p>or</p>
                    <p><a href="https://cosc360.ok.ubc.ca/suyash06/project-JasonR24/php/community.php">Explore Dashboards?</a></p>
                </div>
            </div>  
            <div class="login-box">
                
                <form name = "LoginForm" id ="LoginForm" action= "" onsubmit="return validateLoginForm()" method="GET" required>
                    <div class="item-1">
                        <label>Username or Email</label><br>     
                        <p id = "usernameError"><i class="fa-solid fa-circle-exclamation"></i></p>
                        <input type = "text" name = "user-email" id= "user-email" placeholder="What’s Your Registered Username or Email?" onkeydown="UsernameErrorClearFunction()">
                    </div>
                    <div class="item-2">
                        <label>Password</label><br>
                        <p id = "passwordError"><i class="fa-solid fa-circle-exclamation"></i></p>
                        <input type = "password" name = "password" id= "password" placeholder="What’s Your Password?" onkeydown="PasswordErrorClearFunction()">
                        
                    </div>
                    <div class="item-3">
                        <input type="reset" value="Reset Form">
                        <!-- <div class="box-footer"> -->
                            <!-- <input type="reset" value="Reset Form">
                            <a href="https://cosc360.ok.ubc.ca/suyash06/project-JasonR24/reset-password.php"><p>Forgot Password?</p></a>
                            <input type="submit" value="Login" id = "submit"> -->
                        <!-- </div> -->
                    </div>
                    <div class="item-4">
                        <input type="submit" value="Login" id = "submit">
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
</body>

</html>