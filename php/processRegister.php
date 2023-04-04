<?php
    include 'modules.php';
    
    $errMsg = '';
    if(isset($_POST['registerSubmit']) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['verifyPassword'])){
            $registerUsername= $_POST['username'];
            $registerEmail = $_POST['email'];
            $registerPassword = md5($_POST['password']);
            $registerVerifyPassword = md5($_POST['verifyPassword']);
            $registerSelectedOption = $_POST['selectionMenu'];

            //Set default user type and status
            $registerUserType = "user";
            $registerUserStatus = "enabled";
    
            //Retrieve image file type
            $fileName = basename($_FILES["img"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg');
        
    
            if(in_array($fileType, $allowTypes)){ 
                $image_base64 = base64_encode(file_get_contents($_FILES['img']['tmp_name']) );
                $registerImage = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    
                registerUser($con,$registerUsername,$registerEmail,$registerPassword,$registerVerifyPassword,$registerSelectedOption,$registerUserType,$registerUserStatus,$registerImage);
                
            }else{ 
                $errMsg = 'Sorry, only JPG, JPEG & PNG files are allowed to upload !'; 
                echo "<script>window.alert(\"".$errMsg."\")</script>";
            }
        }else{
            $errMsg = 'Register data was not sent. Please try again !';
            echo "<script>window.alert(".$errMsg.")</script>";
        }
    }else{
            $errMsg = 'Invalid Request Type !';
            echo "<script>window.alert(".$errMsg.")</script>";
    }   
?>