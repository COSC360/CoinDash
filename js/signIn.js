
function addErrorMessage(id, msg){
    let usernameError = document.getElementById("usernameError");
    let passwordError = document.getElementById("passwordError");

    var errorMsg = document.createTextNode(msg);
    if(id = usernameError){
        usernameError.appendChild(errorMsg);
    }else if(id = passwordError){
        passwordError.appendChild(errorMsg);
    }
}
function validateLoginForm() {
    let usernameOrEmail = document.forms["LoginForm"]["user-email"].value;
    let password = document.forms["LoginForm"]["password"].value;
    let usernameError = document.getElementById("usernameError");
    let passwordError = document.getElementById("passwordError");
    // var errorFlag = false;
    var passReg = /^[a-zA-Z]\w{8,16}$/;
    
    if (usernameOrEmail == "" && password =="") {
        usernameError.style.opacity = "1";
        usernameError.style.visibility = "visible";
        usernameError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        passwordError.style.opacity = "1";
        passwordError.style.visibility = "visible";
        passwordError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;  

    }else if(password ==""){
        $msg = "Password empty"
        addErrorMessage(passwordError, msg);
        passwordError.style.opacity = "1";
        passwordError.style.visibility = "visible";
        passwordError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;  

    }else if(usernameOrEmail ==""){
        $msg = "Username/Email empty"
        addErrorMessage(usernameError, msg);
        usernameError.style.opacity = "1";
        usernameError.style.visibility = "visible";
        usernameError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;  

    }else if(!passReg.test(password)){
        // msg = "invalid password"
        // addErrorMessage(passwordError, msg);
        return false;
    }
  }

function UsernameErrorClearFunction(){
        let usernameError = document.getElementById("usernameError");
        usernameError.style.opacity = "0";
        usernameError.style.visibility = "hidden";
}

function PasswordErrorClearFunction(){
        let passwordError = document.getElementById("passwordError");
        passwordError.style.opacity = "0";
        passwordError.style.visibility = "hidden";
}

