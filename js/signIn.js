function validateLoginForm() {
    let usernameOrEmail = document.forms["LoginForm"]["user-email"].value;
    let password = document.forms["LoginForm"]["password"].value;
    if (usernameOrEmail == "" && password =="") {
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
    else if(usernameOrEmail ==""){
        document.getElementById("usernameEmptyError").style.opacity = "1";
        document.getElementById("usernameEmptyError").style.visibility = "visible";
        document.getElementById("usernameEmptyError").style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;        
    }
  }

function UsernameErrorClearFunction(){
    document.getElementById("usernameEmptyError").style.opacity = "0";
    document.getElementById("usernameEmptyError").style.visibility = "hidden";
}

function PasswordErrorClearFunction(){
    document.getElementById("passwordEmptyError").style.opacity = "0";
    document.getElementById("passwordEmptyError").style.visibility = "hidden";
}