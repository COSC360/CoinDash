<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="font/helvetica-now-display/stylesheet.css">
  <link rel="stylesheet" href="css/var.css">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/dashboard.css">
  <link rel="stylesheet" href="css/header-footer.css">
  <link rel="stylesheet" href="css/module.css">
  <link rel="stylesheet" href="css/userEntry.css">
  <script src="js/signIn.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>360 Project</title>
</head>
<body>
<?php  
echo "<div class=\"container\">
    <div class = \"displayText\">
      <p id = \"displayHome\">Home /</p>
      <h1 id = \"displaySignInText\">Sign In</h1>
      <p id = \"displayIntroduction\">Lorem ipsum dolor sit amet consectetur. Erat facilisi varius est cursus. Neque sagittis mi non purus semper lacus mauris magnis.</p>
      <div class=\"secondaryContainer\">
        <div class=\"row\">
            <p class = \"col-3\" id = \"DescriptionFooterText\"><a href=\"http://localhost/project-JasonR24/signUp.php\">Don't Have An Account?</a></p>
            <p class = \"col-1\" id = \"or\">or</p>
            <p class = \"col-3\" id = \"DescriptionFooterText\">Explore Dashboards?</p>
        </div>
      </div>
    </div>
    <form name = \"LoginForm\" class=\"LoginForm\" onsubmit=\"return validateLoginForm()\" method=\"get\">
      <label>Username or Email</label><br>
      <p id = \"usernameEmptyError\">Username cannot be empty <img src=\"svgs/warning-circle.svg\"></p>
      <input type = \"text\" name = \"user-email\" placeholder=\"What’s Your Registered Username or Email?\" class = \"field\" onkeydown=\"UsernameErrorClearFunction()\"><br>
      <label>Password</label><br>
      <p id = \"passwordEmptyError\">Password cannot be empty <img src=\"svgs/warning-circle.svg\"></p>
      <input type = \"password\" name = \"password\" placeholder=\"What’s Your Password?\" class = \"field\" onkeydown=\"PasswordErrorClearFunction()\"><br>
      <div class=\"submissionLoginButton\">
        <input type=\"reset\" value=\"Reset Form\">
        <input type=\"submit\" value=\"Login\">
      </div>
    </form>
  </div>
  <div class = \"displayCards\">
      <a href = \"dashboard.html\"><img class=\"dashboardCard\"></a>
      <a href = \"dashboard.html\"><img class=\"dashboardCard\"></a>
      <a href = \"dashboard.html\"><img class=\"dashboardCard\"></a>
  </div>
  </div>";
?>
</body>
</html>
