<?php
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adminlogin.css">
    <link rel="icon" href="../images/sitelogo.png" type="image/icon type">
    <title>Admin Login</title>
</head>
<body>
    <div class="form-container">
    <h1>Admin Login</h1>
        <section>
            <form action ="processAdminLogin.php" method = "GET">
                <input type="text" name="adminLoginID" placeholder="Login Id">
                <br />
                <input type="password" name="adminPassword" placeholder="Password">
                <br />
                <input type="submit" name="adminLogin" value = "Login">
            </form>
        </section>
    </div>
</body>
</html>