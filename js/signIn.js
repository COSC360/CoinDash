

function validateLoginForm(){
    var formElement = document.forms["LoginForm"];
    formElement.onsubmit = function (e) { e.preventDefault(); FormCheck(); }
    // formElement.onchange = function (e) { resetElement(e); }
}

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
function FormCheck() {
    var submitForm = true;
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
        submitForm == false;  

    }else if(password ==""){
        passwordError.style.opacity = "1";
        passwordError.style.visibility = "visible";
        passwordError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        // $msg = "Password empty"
        // addErrorMessage(passwordError, msg);
        submitForm == false;  

    }else if(usernameOrEmail ==""){
        usernameError.style.opacity = "1";
        usernameError.style.visibility = "visible";
        usernameError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        // $msg = "Username/Email empty"
        // addErrorMessage(usernameError, msg);
        submitForm == false;  

    }else if(!passReg.test(password)){
        passwordError.style.opacity = "1";
        passwordError.style.visibility = "visible";
        passwordError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        // msg = "invalid password"
        // addErrorMessage(passwordError, msg);
        submitForm == false;
    }else{
        submitForm == true;
    }

    if (submitForm == true) {
        document.forms["LoginForm"].submit();
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

function ErrorClearFunction(){
    let passwordError = document.getElementById("passwordError");
    let usernameError = document.getElementById("usernameError");
    passwordError.style.opacity = "0";
    passwordError.style.visibility = "hidden";
    usernameError.style.opacity = "0";
    usernameError.style.visibility = "hidden";
}

