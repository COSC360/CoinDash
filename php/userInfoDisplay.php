<?php
    session_start();
?>

<div class="userInfo">
    <div id = "item-1">
        <img src="<?php echo $_SESSION['RSProfilePicture'];?>" id = "pfp">
        <button id = "enableUserBtn" type ="submit" form="infoDisplayForm" name="enableUser">Enable</button>
        <button id = "disableUserBtn" type ="submit" form="infoDisplayForm" name="disableUser">Disable</button>
        <button id = "deleteUserBtn" type ="submit" form="infoDisplayForm" name="deleteUser">Delete</button>
        <button id = "editUserBtn">Edit</button>
        <button id = "saveUserBtn" type ="submit" form="infoDisplayForm" name="saveUser">Save</button>
    </div>
    <form id ="infoDisplayForm" method = "POST" action="processUpdate.php">
        <div id = "item-2">
            <label>User ID :</label>
            <input type="text" name="userID" value = "<?php echo $_SESSION['RSId']?>">
            <label>Username :</label>
            <input type="text" name="username" value = "<?php echo $_SESSION['RSUsername']?>">
            <label>User Password :</label>
            <input type="text" name="password" value = "<?php echo $_SESSION['RSPassword']?>">
            <label>User Email :</label>
            <input type="text" name="email" value = "<?php echo $_SESSION['RSEmail']?>">
            <label>User Coming From :</label>
            <input type="text" name="comingFrom" value = "<?php echo $_SESSION['RSComingFrom']?>">
            <label>User Type :</label>
            <input type="text" name="userType" value = "<?php echo $_SESSION['RSUserType']?>">
            <label>User Status :</label>
            <input type="text" name="status" value = "<?php echo $_SESSION['RSUserStatus']?>">
            <label>User Registeration Timestamp :</label>
            <input type="text" name="regTimestamp" value = "<?php echo $_SESSION['RSRegisterTimestamp']?>">
        </div>
    </form>    
</div>
<script>
    for(var i = 0; i < infoDisplayForm.length; i++){
        infoDisplayForm[i].disabled = true;
    }
    
    function enableField(){
        for(var i = 0; i < infoDisplayForm.length; i++){
            infoDisplayForm[i].disabled = false;
        }
        enableUserBtn.setAttribute("style", "background-color: #2fc363;");
        disableUserBtn.setAttribute("style", "background-color: #2fc363;");
        deleteUserBtn.setAttribute("style", "background-color: #2fc363;");
        saveUserBtn.setAttribute("style", "background-color: #2fc363;");
    }
</script>    

