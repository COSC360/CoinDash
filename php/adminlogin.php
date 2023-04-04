<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adminlogin.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="form-container">
    <h1>Admin Login</h1>
        <section>
            <input #username type="text" name="username" placeholder="Username">
            <br />
            <input #password type="password" name="password" placeholder="Password">
            <br />
            <button type="button" role="button" (click)="login($event, username, password)">Login</button>
        </section>
    </div>
</body>
</html>