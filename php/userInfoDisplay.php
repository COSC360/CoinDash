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
        <input type="text" value = "<?php echo $_SESSION['RSId']?>" disabled>
        <label>Username :</label>
        <input type="text" value = "<?php echo $_SESSION['RSUsername']?>" disabled>
        <label>User Password :</label>
        <input type="text" value = "<?php echo $_SESSION['RSPassword']?>" disabled>
        <label>User Email :</label>
        <input type="text" value = "<?php echo $_SESSION['RSEmail']?>" disabled>
        <label>User Coming From :</label>
        <input type="text" value = "<?php echo $_SESSION['RSComingFrom']?>" disabled>
        <label>User Type :</label>
        <input type="text" value = "<?php echo $_SESSION['RSUserType']?>" disabled>
        <label>User Status :</label>
        <input type="text" value = "<?php echo $_SESSION['RSUserStatus']?>" disabled>
        <label>User Registeration Timestamp :</label>
        <input type="text" value = "<?php echo $_SESSION['RSRegisterTimestamp']?>" disabled>
    </div>
</div>