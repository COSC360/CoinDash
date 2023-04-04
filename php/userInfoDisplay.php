<?php
    session_start();
?>
<div class="userInfo">
    <div id = "item-1">
        <img src="<?php echo $_SESSION['RSProfilePicture']?>" id = "pfp">
        <button class = "enableUserBtn">Enable</button>
        <button class = "disableUserBtn">Disable</button>
        <button class = "deleteUserBtn">Delete</button>
        <button class = "editUserBtn">Edit</button>
    </div>
    <div id = "item-2">
        <form method = "POST" id="userInfoDisplayForm">
            <label>User ID :</label>
            <input type="text" value = "<?php echo $_SESSION['RSId']?>" >
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
        </form>
    </div>
</div>
<script>
    const forms = document.querySelectorAll('userInfoDisplayForm');
    const form = forms[0];

    Array.from(form.elements).forEach((input) => {
        input.disabled = true;
    });
</script>