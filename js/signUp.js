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

function addErrorMessage($id,$msg){
    var errorMsg = document.createTextNode($msg);
    if($id = $usernameError){
        usernameError.appendChild(errorMsg);
    }else if($id = $passwordError){
        passwordError.appendChild(errorMsg);
    }else if($id = $Error){
        emailError.appendChild(errorMsg);
    }else if($id = $verifyPasswordError){
        verifyPasswordError.appendChild(errorMsg);
    }else if($id = $imageUploadError){
        imageUploadError.appendChild(errorMsg);
    }
}

function validateRegisterForm() {
    if(empty(username)){
        $msg = "Required";
        addErrorMessage($usernameError,$msg);
    }else if(empty(password)){
        $msg = "Required";
        addErrorMessage($passwordError, $msg);
    }else if(empty(verifyPassword)){
        $msg = "Required";
        addErrorMessage($verifyPasswordError, $msg);
    }else if(empty(email)){
        $msg = "Required";
        addErrorMessage($emailError$msg);
    }else if(empty(img)){
        $msg = "Required";
        addErrorMessage($emailError, $msg);
    }else if(!passReg.test($password)){
        $msg = "Invalid password";
        addErrorMessage($passowrdError, $msg);
    }else if(!emailReg.test($email)){
        $msg = "Invalid e-mail";
        addErrorMessage($emailError, $msg);
    }
}


