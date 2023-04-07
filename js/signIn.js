const loginForm = document.forms['loginForm']; // Login Form
const requiredInput = document.querySelectorAll(".required");
var errorText = document.querySelectorAll(".errorText");

// <i class="fa-sharp fa-solid fa-circle-check" style="color: #11e43b;"></i>
// <i class="fa-sharp fa-solid fa-circle-xmark" style="color: #ff0000;"></i>

const passwordRegex = "^[a-zA-Z]\w{8,16}$ "; //Simple password expression. The password must be at least 8 characters but no more than 16 characters long
const emailRegex = "^(.+)@([^\.].*)\.([a-z]{2,})$"; //Email validation based on current standard naming rules

function showError(inputField,errMsg){
    inputField.innerText = errMsg;
}

function hideError(inputField){

}

loginForm.addEventListener("submit",function(e){
    let loginId = requiredInput[0].value;
    let password = requiredInput[1].value;

    var error = false;

    console.log(error);

    if(loginId == '' && password == '')
    {
        error = true;
        showError(errorText[0], "Login ID cannot be empty");
        showError(errorText[1], "Password cannot be empty");
    }else if(loginId == '')
    {
        error = true;
        showError(errorText[0], "Login ID cannot be empty");
    }else if(password == '')
    {
        error = true;
        showError(errorText[1], "Password cannot be empty");
    }else{
        error = false;
    }

    console.log(error);
    
    if (error = true){
        e.preventDefault();
        console.log("Form did not pass !");
    }else{
        e.preventDefault();
        console.log("Form passed !");   
    }

});
 

// function validEntry(){

// }
