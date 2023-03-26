

function validateLoginForm() {
    let username = document.forms["RegiserForm"]["username"].value;
    let password = document.forms["RegiserForm"]["email"].value;
    let email = document.forms["RegiserForm"]["password"].value;
    let verifyPassword = document.forms["RegiserForm"]["password"].value;
    let image = document.getElementById('img');
    let usernameError = document.getElementById("usernameError");
    let passwordError = document.getElementById("passwordError");
    let emailError = document.getElementById("emailError");
    let verifyPasswordError = document.getElementById("verifyPasswordError");
    let imageUploadError = document.getElementById("imageUploadError");
    // var errorFlag = false;
    var passReg = /^[a-zA-Z]\w{8,16}$/;
    var emailReg = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    
    if (username == "" && password =="" && email == "" && verifyPassword == "" && image == "") {
        usernameError.style.opacity = "1";
        usernameError.style.visibility = "visible";
        usernameError.style.transition = "visibility 0s linear 0s, opacity 300ms";

        passwordError.style.opacity = "1";
        passwordError.style.visibility = "visible";
        passwordError.style.transition = "visibility 0s linear 0s, opacity 300ms";

        emailError.style.opacity = "1";
        emailError.style.visibility = "visible";
        emailError.style.transition = "visibility 0s linear 0s, opacity 300ms";

        verifyPasswordError.style.opacity = "1";
        verifyPasswordError.style.visibility = "visible";
        verifyPasswordError.style.transition = "visibility 0s linear 0s, opacity 300ms";

        imageUploadError.style.opacity = "1";
        imageUploadError.style.visibility = "visible";
        imageUploadError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;  
    }
    if(password ==""){
        passwordError.style.opacity = "1";
        passwordError.style.visibility = "visible";
        passwordError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;
        // $msg = "Password empty"
        // addErrorMessage(passwordError, msg); 
    }

    if(verifyPassword ==""){
        verifyPasswordError.style.opacity = "1";
        verifyPasswordError.style.visibility = "visible";
        verifyPasswordError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;
        // $msg = "Password empty"
        // addErrorMessage(passwordError, msg); 
    }
    
    if(username ==""){
        usernameError.style.opacity = "1";
        usernameError.style.visibility = "visible";
        usernameError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;
        // $msg = "Username/Email empty"
        // addErrorMessage(usernameError, msg);
    }

    if(email ==""){
        emailError.style.opacity = "1";
        emailError.style.visibility = "visible";
        emailError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;
        // $msg = "Username/Email empty"
        // addErrorMessage(usernameError, msg);
    }

    if(image ==""){
        imageUploadError.style.opacity = "1";
        imageUploadError.style.visibility = "visible";
        imageUploadError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;
        // $msg = "Username/Email empty"
        // addErrorMessage(usernameError, msg);
    }

    if(!passReg.test(password)){
        passwordError.style.opacity = "1";
        passwordError.style.visibility = "visible";
        passwordError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;
    }

    if(!emailReg.test(email)){
        passwordError.style.opacity = "1";
        passwordError.style.visibility = "visible";
        passwordError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;
    }

    if(password != verifyPassword){
        passwordError.style.opacity = "1";
        passwordError.style.visibility = "visible";
        passwordError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        verifyPasswordError.style.opacity = "1";
        verifyPasswordError.style.visibility = "visible";
        verifyPasswordError.style.transition = "visibility 0s linear 0s, opacity 300ms";
        return false;
    }

  }

// function UsernameErrorClearFunction(){
//         let usernameError = document.getElementById("usernameError");
//         usernameError.style.opacity = "0";
//         usernameError.style.visibility = "hidden";
        
// }

// function PasswordErrorClearFunction(){
//         let passwordError = document.getElementById("passwordError");
//         passwordError.style.opacity = "0";
//         passwordError.style.visibility = "hidden";
// }

function ErrorClearFunction(){
    let usernameError = document.getElementById("usernameError");
    let passwordError = document.getElementById("passwordError");
    let emailError = document.getElementById("emailError");
    let verifyPasswordError = document.getElementById("verifyPasswordError");
    let imageUploadError = document.getElementById("imageUploadError");
    
    passwordError.style.opacity = "0";
    passwordError.style.visibility = "hidden";

    usernameError.style.opacity = "0";
    usernameError.style.visibility = "hidden";

    emailError.style.opacity = "0";
    emailError.style.visibility = "hidden";

    verifyPasswordError.style.opacity = "0";
    verifyPasswordError.style.visibility = "hidden";

    imageUploadError.style.opacity = "0";
    imageUploadError.style.visibility = "hidden";
}

window.onload = validateLoginForm();

