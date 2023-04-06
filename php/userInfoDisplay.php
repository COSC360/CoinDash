<?php
    session_start();
?>

<div class="userInfo">
    <div id = "item-1">
        <img src="<?php echo $_SESSION['RSProfilePicture'];?>" id = "pfp">
        <div class="btnGroup">
            <button id = "enableUserBtn" type ="submit" form="<?php echo $_SESSION['formID'];?>" name="enableUser">Enable</button>
            <button id = "disableUserBtn" type ="submit" form="<?php echo $_SESSION['formID'];?>" name="disableUser">Disable</button>
            <button id = "deleteUserBtn" type ="submit" form="<?php echo $_SESSION['formID'];?>" name="deleteUser">Delete</button>
            <button id = "editUserBtn">Edit</button>
            <button id = "saveUserBtn" type ="submit" form="<?php echo $_SESSION['formID'];?>" name="saveUser">Save</button>
        </div>
    </div>
    <form name = "<?php echo $_SESSION['formID'];?>" id ="<?php echo $_SESSION['formID'];?>" method = "POST" action="processUpdate.php">
        <div id = "item-2">
            <label>User ID :</label>
            <input type="text" name="userID" value = "<?php echo $_SESSION['RSId']?>">
            <label>Username :</label>
            <input type="text" name="username" value = "<?php echo $_SESSION['RSUsername']?>">
            <label>User Password :</label>
            <input type="text" name="password">
            <label>User Email :</label>
            <input type="text" name="email" value = "<?php echo $_SESSION['RSEmail']?>">
            <label>User Coming From :</label>
            <select name="comingFrom">
                <option value="<?php echo $_SESSION['RSComingFrom']?>" selected="selected"><?php echo $_SESSION['RSComingFrom']?></option>
                <option value="Google">Google</option>
                <option value="Friend">Friend</option>
                <option value="Yahoo">Yahoo</option>
                <option value="Twitter">Twitter</option>
                <option value="Instagram">Instagram</option>
                <option value="Online Adverstisement">Online Adverstisement</option>
                <option value="Crypto Exchange">Crypto Exchange</option>
            </select>
            <label>User Type :</label>
            <input type="text" name="userType" value = "<?php echo $_SESSION['RSUserType']?>">
            <label>User Status :</label>
            <input type="text" name="status" value = "<?php echo $_SESSION['RSUserStatus']?>">
            <label>User Registeration Timestamp :</label>
            <input type="text" name="regTimestamp" value = "<?php echo $_SESSION['RSRegisterTimestamp']?>">
        </div>
    </form>    
</div>  

