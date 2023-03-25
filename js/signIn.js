let usernameOrEmail = document.forms["LoginForm"]["user-email"].value;
let password = document.forms["LoginForm"]["password"].value;
let usernameError = document.getElementById("usernameError");
let passwordError = document.getElementById("passwordError");
// var errorFlag = false;
var passReg = /^[a-zA-Z]\w{8,16}$/;
window.onload = function addErrorMessage($id, $msg){
    var errorMsg = document.createTextNode($msg);
    if($id = $usernameError){
        usernameError.innerText = $msg;
    }else if($id = $passwordError){
        // passwordError.appendChild(errorMsg);
        passwordError.innerText = $msg; 
    }
}
window.onload = function validateLoginForm() {
    if (usernameError == "" && password =="") {
        usernameError.style.opacity = "1";
        usernameError.style.visibility = "visible";
        usernameError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        usernameError.style.opacity = "1";
        usernameError.style.visibility = "visible";
        usernameError.style.transition = "visibility 0s linear 0s, opacity 300ms";  

    }else if(password ==""){
        $msg = "Password cannot be empty !"
        addErrorMessage($passwordError, $msg);
        passwordError.style.opacity = "1";
        passwordError.style.visibility = "visible";
        passwordError.style.transition = "visibility 0s linear 0s, opacity 300ms";  

    }else if(usernameOrEmail ==""){
        $msg = "Username/Email cannot be empty !"
        addErrorMessage($usernameError, $msg);
        usernameError.style.opacity = "1";
        usernameError.style.visibility = "visible";
        usernameError.style.transition = "visibility 0s linear 0s, opacity 300ms";  

    }else if(! passReg.test($password)){
        $msg = "Please enter a valid password !"
        addErrorMessage($passwordError, $msg);
    }
  }

window.onload = function UsernameErrorClearFunction(){
        usernameError.style.opacity = "0";
        usernameError.style.visibility = "hidden";
}

window.onload = function PasswordErrorClearFunction(){
        passwordError.style.opacity = "0";
        passwordError.style.visibility = "hidden";
}

