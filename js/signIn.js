const loginForm = document.forms['loginForm']; // Login Form
const requiredInput = document.querySelectorAll(".required");
var errorTextElement = document.querySelectorAll(".errorText");
var errorLogoElement = document.querySelectorAll(".errorLogo");

// <i class="fa-sharp fa-solid fa-circle-check" style="color: #11e43b;"></i>
// 

const passwordRegex = /^[a-zA-Z]\w{8,16}$/; //Simple password expression. The password must be at least 8 characters but no more than 16 characters long
const emailRegex = /^(.+)@([^\.].*)\.([a-z]{2,})$/; //Email validation based on current standard naming rules
const emailDomains = ["gmail","outlook","yahoo"];

function showError(i,errMsg){
    errorTextElement[i].innerText = errMsg;
    errorTextElement[i].classList.add("showError");
    errorLogoElement[i].classList.add("showError");
}

function hideError(inputField){

}

loginForm.addEventListener("submit",function(e){
    let loginId = requiredInput[0].value;
    let password = requiredInput[1].value;
    console.log(requiredInput[0].value);
    console.log(requiredInput[0].value);
    var error = false;


    if(loginId == '' && password == '')
    {
        error = true;
        showError(0, "Login ID cannot be empty");
        showError(1, "Password cannot be empty");
    }else if(loginId == '')
    {
        error = true;
        showError(errorTextElement[0], "Login ID cannot be empty");
    }else if(password == '')
    {
        error = true;
        showError(errorTextElement[1], "Password cannot be empty");
    }else if(!passwordRegex.test(password))
    {
        error = true;
        showError(errorTextElement[1], "Password is invalid. It must be between 8-16 characters");
    }else if(emailDomains.includes(loginId) && !emailRegex.test(loginId))
    {
        error = true;
        showError(errorTextElement[1], "Email is invalid");
    }

    console.log(error);

    if (error = true){
        e.preventDefault();
    }else{
        e.preventDefault();
    }

});
 

// function validEntry(){

// }
