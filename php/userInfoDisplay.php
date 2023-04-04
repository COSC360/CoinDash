<?php
    session_start();
?>

<div class="userInfo">
    <div id = "item-1">
        <img src="<?php echo $_SESSION['RSProfilePicture']?>" id = "pfp">
        <button id = "enableUserBtn">Enable</button>
        <button id = "disableUserBtn">Disable</button>
        <button id = "deleteUserBtn">Delete</button>
        <button id = "editUserBtn">Edit</button>
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
<script>
    const infoDisplayForm = document.forms["infoDisplayForm"];
    document.getElementById("editUserBtn").addEventListener("click", enableField);
    for(var i = 0; i < infoDisplayForm.length; i++){
        infoDisplayForm[i].disabled = true;
    }
    
    function enableField(){
        for(var i = 0; i < infoDisplayForm.length; i++){
            infoDisplayForm[i].disabled = false;
        }
    }

</script>    

