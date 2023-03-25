<?php
session_start();
// error_reporting(E_ALL);
// init_set('display_errors','1');
// include_once('ValidationResult.class.php');

include 'DBconnection.php';

    $statusMsg = '';

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }else{
        if(!empty($_FILES["img"]["name"])) { 
            $username= $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $verifyPassword = $_POST['verifyPassword'];
            $selectedOption = $_POST['selectionMenu'];
            $fileName = basename($_FILES["img"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            $userType = "user";

            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg');
            
            //Check if data already exists 
            $stmt = $con->prepare("SELECT * FROM `user_auth` WHERE  `Email` = ? && `Password` = ? || `Username` = ? && `Password` = ? ");
            $stmt->bind_param("ssss", $email,$password,$username,$password); 
            $stmt->execute();
            $resultSet = $stmt->get_result(); // get the mysqli result
            $result = $resultSet->fetch_assoc();

            if(in_array($fileType, $allowTypes)){ 
                // $image = $_FILES['img']['tmp_name']; 
                // $imgContent = addslashes(file_get_contents($image));
                $image_base64 = base64_encode(file_get_contents($_FILES['img']['tmp_name']) );
                $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;

                if($email == "" || $username == "" || $password == "" || $verifyPassword == ""){
                    $statusMsg = 'Please enter all the required details !';
                    echo "<script>window.alert(".$statusMsg .")</script>";
                }elseif($password != $verifyPassword){
                    $statusMsg = 'Passwords do not match !';
                    echo "<script>window.alert(".$statusMsg .")</script>";
                }elseif($result != null){
                    $statusMsg = 'User already exists !';
                    echo "<script>window.alert(".$statusMsg .")</script>";
                }else{
                    // Insert image content into database   
                    $stmt = $con->prepare("INSERT INTO `user_auth` (`Username`, `Email`, `Password`,`comingFrom`,`profilePicture`,`userType`) VALUES (?,?,?,?,?,?)");
                    $stmt->bind_param("ssssbs",$username,$email,$password,$selectedOption,$image,$userType); 
                    $stmt->execute();
                    header('location:signIn.php');
                    $stmt->close();
                    $con->close();
                }
            }else{ 
                $statusMsg = 'Sorry, only JPG, JPEG & PNG files are allowed to upload.'; 
            } 
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 360</title>
    <link rel="stylesheet" href="font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="css/var.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="stylesheet" href="css/module.css">
    <link rel="stylesheet" href="css/userAuth.css">
    <script src="js/signIn.js"></script>
    <script src="js/signUp.js"></script>
</head>

<body>
    <div class="main-container">
        <header class="header-container">
            <div class="logo">
                <img src="images/sitelogo.png">
            </div>
            <nav>
                <a href="https://cosc360.ok.ubc.ca/suyash06/project-JasonR24/community.php">Community</a>
                <a href="https://cosc360.ok.ubc.ca/suyash06/project-JasonR24/help.php">Help</a>
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
        <div class = "auth-container">
            <div class="register-info">
                <h1>Home/</h1>
                <h2>Sign Up</h2>
                <p>Lorem ipsum dolor sit amet consectetur. Erat facilisi varius est cursus. Neque sagittis mi non purus semper lacus mauris magnis.</p>
                <div class="info-footer">
                    <p><a href="https://cosc360.ok.ubc.ca/suyash06/project-JasonR24/signIn.php">Already Have An Account?</a></p>
                    <p>or</p>
                    <p><a href="https://cosc360.ok.ubc.ca/suyash06/project-JasonR24/community.php">Explore Dashboards?</a></p>
                </div>
            </div>  
            <div class="register-box">
                <form name = "RegisterForm" enctype="multipart/form-data" action= "" onsubmit="return validateRegisterForm()" method="POST" required>
                            <div class="item-1">
                                <label>Username <span style="color: red;">*</span></label><br>
                                <p id = "usernameError"><i class="fa-solid fa-circle-exclamation"></i></p>                   
                                <input type = "text" name = "username" placeholder="What Should We Call You?">
                            </div>
                            <div class="item-2">
                                <label>Email <span style="color: red;">*</span></label><br>
                                <input type = "email" name = "email" placeholder="What's Your Email?">
                            </div>
                            <div class="item-3">
                                <label>Password <span style="color: red;">*</span></label><br>                                   
                                <input type = "password" name = "password" placeholder="What’s Your Password?">
                            </div>
                            <div class="item-4">
                                <label>Verify Password <span style="color: red;">*</span></label><br>
                                <input type = "password" name = "verifyPassword" placeholder="Confirm Password?">
                            </div>
                            <div class="item-5">
                                <label>Coming From</label><br>
                                <select name="selectionMenu">
                                    <option value="Google"  selected="selected">Google</option>
                                    <option value="Friend">Friend</option>
                                    <option value="Social Media">Social Media</option>
                                </select>
                            </div>
                            <div class="item-6">
                                <label>Profile Photo <span style="color: red;">*</span></label><br>
                                <!-- <button id="upload-file-btn" onclick= "document.getElementById('getFile').click()">Upload File <img src="svgs/arrow-right-short.svg"></button>
                                <input type='file' id="getFile" style="display:none"> -->
                                <input type="file" name="img" accept="image/*">
                            </div>
                            <div class="item-7">
                                <input type="reset" value="Reset Form">
                            </div>
                            <div class = "item-8">
                                <input type="submit" value="Get Started !">
                            </div>                    
                </form>
            </div>
        </div>
        <div class = "register-display-card-container">  
            <!-- <a href = "http://cosc360.ok.ubc.ca/suyash06/cosc360-Project/dashboard.php"><img class="dashboardCard"></a>
            <a href = "http://cosc360.ok.ubc.ca/suyash06/cosc360-Project/dashboard.php"><img class="dashboardCard"></a>
            <a href = "http://cosc360.ok.ubc.ca/suyash06/cosc360-Project/dashboard.php"><img class="dashboardCard"></a> -->
        </div>
        </div>
    </div>   
</body>

</html>