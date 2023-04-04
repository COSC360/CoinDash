<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="userInfo">
        <div id = "item-1">
            <img src="<?php echo $_SESSION['RSProfilePicture']?>" id = "pfp">
            <button class = "enableUserBtn">Enable</button>
            <button class = "disableUserBtn">Disable</button>
            <button class = "deleteUserBtn">Delete</button>
            <button class = "editUserBtn">Edit</button>
        </div>
        <form id ="infoDisplayForm">
            <div id = "item-2">
                <label>User ID :</label>
                <input type="text" value = "<?php echo $_SESSION['RSId']?>">
                <label>Username :</label>
                <input type="text" value = "<?php echo $_SESSION['RSUsername']?>" >
                <label>User Password :</label>
                <input type="text" value = "<?php echo $_SESSION['RSPassword']?>" >
                <label>User Email :</label>
                <input type="text" value = "<?php echo $_SESSION['RSEmail']?>" >
                <label>User Coming From :</label>
                <input type="text" value = "<?php echo $_SESSION['RSComingFrom']?>" >
                <label>User Type :</label>
                <input type="text" value = "<?php echo $_SESSION['RSUserType']?>" >
                <label>User Status :</label>
                <input type="text" value = "<?php echo $_SESSION['RSUserStatus']?>" >
                <label>User Registeration Timestamp :</label>
                <input type="text" value = "<?php echo $_SESSION['RSRegisterTimestamp']?>" >
            </div>
        <form>    
    </div>
    <!-- <script>
        const infoDisplayForm = document.forms["infoDisplayForm"];

        for(int i = 0; i < infoDisplayForm.length)

    </script>     -->
</body>
</html>
