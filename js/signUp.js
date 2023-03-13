function validateRegisterForm() {
  let username = document.forms["RegisterForm"]["username"].value;
  let password = document.forms["RegisterForm"]["password"].value;
  let verifyPassword = document.forms["RegisterForm"]["verifyPassword"].value;
  let email = document.forms["RegisterForm"]["email"].value;
  if (username == "" && password =="" && verifyPassword == "" && email == "") {
      document.getElementById("usernameEmptyError").style.opacity = "1";
      document.getElementById("usernameEmptyError").style.visibility = "visible";
      document.getElementById("usernameEmptyError").style.transition = "visibility 0s linear 0s, opacity 300ms";
      document.getElementById("passwordEmptyError").style.opacity = "1";
      document.getElementById("passwordEmptyError").style.visibility = "visible";
      document.getElementById("passwordEmptyError").style.transition = "visibility 0s linear 0s, opacity 300ms";
    return false;
  }else if(password ==""){
      document.getElementById("passwordEmptyError").style.opacity = "1";
      document.getElementById("passwordEmptyError").style.visibility = "visible";
      document.getElementById("passwordEmptyError").style.transition = "visibility 0s linear 0s, opacity 300ms";
      return false;        
  }
  else if(username ==""){
      document.getElementById("usernameEmptyError").style.opacity = "1";
      document.getElementById("usernameEmptyError").style.visibility = "visible";
      document.getElementById("usernameEmptyError").style.transition = "visibility 0s linear 0s, opacity 300ms";
      return false;        
  }
  // else if(email ==""){
  //     document.getElementById("emailEmptyError").style.opacity = "1";
  //     document.getElementById("emailEmptyError").style.visibility = "visible";
  //     document.getElementById("emailEmptyError").style.transition = "visibility 0s linear 0s, opacity 300ms";
  //     return false;        
  // }
  // else if(verifyPassword ==""){
  //     document.getElementById("verifyPasswordEmptyError").style.opacity = "1";
  //     document.getElementById("verifyPasswordEmptyError").style.visibility = "visible";
  //     document.getElementById("verifyPasswordEmptyError").style.transition = "visibility 0s linear 0s, opacity 300ms";
  //     return false;        
  // }
}

function UsernameErrorClearFunction(){
  document.getElementById("usernameEmptyError").style.opacity = "0";
  document.getElementById("usernameEmptyError").style.visibility = "hidden";
}

function PasswordErrorClearFunction(){
  document.getElementById("passwordEmptyError").style.opacity = "0";
  document.getElementById("passwordEmptyError").style.visibility = "hidden";
}

// function verifyPasswordErrorClearFunction(){
//   document.getElementById("verifyPasswordEmptyError").style.opacity = "0";
//   document.getElementById("verifyPasswordEmptyError").style.visibility = "hidden";
// }

// function EmailErrorClearFunction(){
//   document.getElementById("emailEmptyError").style.opacity = "0";
//   document.getElementById("emailEmptyError").style.visibility = "hidden";
// }

