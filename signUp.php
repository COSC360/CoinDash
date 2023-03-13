<?php


?>
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
  <script src="js/signUp.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>360 Project</title>
</head>
<body>
<?php  
echo "<div class=\"container\">
    <div class = \"displayText\">
      <p id = \"displayHome\">Home /</p>
      <h1 id = \"displaySignInText\">Sign Up</h1>
      <p id = \"displayIntroduction\">Lorem ipsum dolor sit amet consectetur. Erat facilisi varius est cursus. Neque sagittis mi non purus semper lacus mauris magnis.</p>
      <div class=\"secondaryContainer\">
        <div class=\"row\">
            <p class = \"col-3\" id = \"DescriptionFooterText\"><a href=\"http://localhost/project-JasonR24/signIn.php\">Already Have An Account?</a></p>
            <p class = \"col-1\" id = \"or\">or</p>
            <p class = \"col-3\" id = \"DescriptionFooterText\">Explore Dashboards?</p>

        </div>
      </div>
    </div>
    <form  name = \"RegisterForm\" class=\"RegisterForm\" onsubmit=\"return validateRegisterForm()\">
    <table>
        <tr>
            <td>
                <label>Username</label><br>
                <p id = \"usernameEmptyError\">Required <img src=\"svgs/warning-circle.svg\"></p>
                <input type = \"text\" name = \"username\" placeholder=\"What Can We Call You?\" class = \"fieldRegister\" onkeydown=\"UsernameErrorClearFunction()\">
            </td>
            <td>
                <label>Email</label><br>
                <input type = \"email\" name = \"email\" placeholder=\"What's Your Email?\" class = \"fieldRegister\" onkeydown=\"EmailErrorClearFunction()\">
            </td>
        </tr>
        <tr>
            <td>
                <label>Password</label><br>
                <p id = \"passwordEmptyError\">Required <img src=\"svgs/warning-circle.svg\"></p>
                <input type = \"password\" name = \"password\" placeholder=\"What's Your Password?\" class = \"fieldRegister\" onkeydown=\"PasswordErrorClearFunction()\">
            </td>
            <td>
                <label>Verify Password</label><br>
                <input type = \"password\" name = \"verifyPassword\" placeholder=\"Confirm Password?\" class = \"fieldRegister\" onkeydown=\"VerifyPasswordErrorClearFunction()\">
            </td>
        </tr>
        <tr>
            <td>
                <label>Coming From</label><br>
                <select id=\"selectionMenu\">
                    <option value=\"Google\">Google</option>
                    <option value=\"Friend\">Friend</option>
                    <option value=\"Social Media\">Social Media</option>
                </select>
            </td>
            <td>
                <label>Profile Photo</label><br>
                <input type=\"file\" id=\"img\" name=\"img\" accept=\"image/*\"  class = \"fieldRegister\">
            </td>
        </tr>
    </table>
    <div class=\"submissionRegisterButton\">
        <input type=\"reset\" value=\"Reset Form\">
        <input type=\"submit\" value=\"Get Started !\">
      </div>
    </form>
   
  </div>
  <div class = \"displayCards\">
      <img class=\"dashboardCard\">
      <img class=\"dashboardCard\">
      <img class=\"dashboardCard\">
  </div>
  </div>";
?>
</body>
</html>
