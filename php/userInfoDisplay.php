<?php
    session_start();
?>
<div class="userInfo">
    <div id = "item-1">
        <img src="../images/profile-picture.png" id = "pfp">
        <button>Enable</button>
        <button>Disable</button>
        <button>Delete</button>
    </div>
    <div id = "item-2">
        <label>User ID :</label>
        <input type="text" value = "<?php echo $_SESSION['RSId']?>">
        <label>Username :</label>
        <input type="text" value = "<?php echo $_SESSION['RSUsername']?>">
        <label>User Password :</label>
        <input type="text" value = "<?php echo $_SESSION['RSPassword']?>">
        <label>User Email :</label>
        <input type="text" value = "<?php echo $_SESSION['RSEmail']?>">
        <label>User Coming From :</label>
        <input type="text" value = "<?php echo $_SESSION['RSComingFrom']?>">
        <label>User Type :</label>
        <input type="text" value = "<?php echo $_SESSION['RSUserType']?>">
        <label>User Status :</label>
        <input type="text" value = "<?php echo $_SESSION['RSUserStatus']?>">
        <label>User Registeration Timestamp :</label>
        <input type="text" value = "<?php echo $_SESSION['RSRegisterTimestamp']?>">
    </div>
</div>