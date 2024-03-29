const loginForm = document.forms['loginForm']; // Login Form
const requiredInput = document.querySelectorAll(".required");
let errorTextElement = document.querySelectorAll(".errorTextLogin");
let errorLogoElement = document.querySelectorAll(".errorLogoLogin");

// <i class="fa-sharp fa-solid fa-circle-check" style="color: #11e43b;"></i>

const passwordRegex = /^[a-zA-Z]\w{8,16}$/; //Simple password expression. The password must be at least 8 characters but no more than 16 characters long
const emailRegex = /^(.+)@([^\.].*)\.([a-z]{2,})$/; //Email validation based on current standard naming rules
const emailDomains = ["gmail","outlook","yahoo"];

function showError(i,errMsg){
    errorTextElement[i].innerText = errMsg;
    errorTextElement[i].classList.add("showError");
    errorLogoElement[i].classList.add("showError");
}
function hideError(i){
    if(errorTextElement[i].classList.contains("showError")){
        errorTextElement[i].classList.remove("showError");
        errorLogoElement[i].classList.remove("showError");
        errorTextElement[i].innerText = "";
    }
}

loginForm.addEventListener("submit",function(e){
    const loginId = requiredInput[0].value;
    const password = requiredInput[1].value;

    var error = false;
    if(loginId == '' && password == '')
    {
        error = true;
        showError(0, "Login ID cannot be empty");
        showError(1, "Password cannot be empty");
    }
    
    if(loginId == '')
    {
        error = true;
        showError(0, "Login ID cannot be empty");
    }
    
    if(password == '')
    {
        error = true;
        showError(1, "Password cannot be empty");
    }else if(!passwordRegex.test(password))
    {
        error = true;
        showError(1, "Password is invalid. It must be between 8-16 characters");
    }
    
    if(emailDomains.includes(loginId) && !emailRegex.test(loginId))
    {
        error = true;
        showError(0, "Email is invalid");
    }

    if (error == true){
        e.preventDefault();
    }

});

loginForm.addEventListener("reset",function(e){
    for(var i = 0; i < requiredInput.length; i++){
        hideError(i);
    }
});
