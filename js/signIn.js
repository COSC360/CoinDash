var loginForm = document.forms['loginForm']; // Login Form

var loginId = loginForm[0].value; //Login Id (Username or Email)
var password = loginForm[1].value; // Login Password

var loginIdErrorText = document.getElementsByClassName('errorText')[0].innerText;
var passwordErrorText = document.getElementsByClassName('errorText')[1].innerText;


var loginBtn = document.getElementById("loginSubmit"); // Login button



// <i class="fa-sharp fa-solid fa-circle-check" style="color: #11e43b;"></i>
// <i class="fa-sharp fa-solid fa-circle-xmark" style="color: #ff0000;"></i>

const passwordRegex = "^[a-zA-Z]\w{8,16}$ "; //Simple password expression. The password must be at least 8 characters but no more than 16 characters long
const emailRegex = "^(.+)@([^\.].*)\.([a-z]{2,})$"; //Email validation based on current standard naming rules


loginForm.addEventListener("submit",function(e){
    let errState = null;

    if(loginId == null && password == null){
        loginIdErrorText = "Login Id cannot be empty";
        passwordErrorText = "Password cannot be empty";
        errState = true;
    }else{
        errState = false;
    }

    if(loginId == null){
        loginIdErrorText = "Login Id cannot be empty";
        errState = true;
    }else{
        errState = false;
    }

    if(password == null){
        passwordErrorText = "Password cannot be empty";
        errState = true;
    }else{
        errState = false;
    }

    if(errState = true){
        displayError(true);
        e.preventDefault();
    }else{
        displayError(false);
    }
});
 
function displayError(errState){
    if(errState == true){
        showError();
    }
    if(errState == false){
        hideError();
    }
}

function showError(){
    console.log("Error is shown !");
}

function hideError(){
    console.log("Error is not shown !");
}

// function validEntry(){

// }
