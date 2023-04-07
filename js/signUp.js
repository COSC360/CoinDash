const registerForm = document.forms['registerForm']; // Login Form
const requiredInput = document.querySelectorAll(".required");
let errorTextElement = document.querySelectorAll(".errorTextRegister");
let errorLogoElement = document.querySelectorAll(".errorLogoRegister");

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

registerForm.addEventListener("submit",function(e){
    const username = requiredInput[0].value;
    const email = requiredInput[1].value;
    const password = requiredInput[2].value;
    const verifyPassword = requiredInput[3].value;
    const img = requiredInput[4].value;

    var error = false;
    if(username == '' && email == '' && password == '' && verifyPassword == '' && img == '')
    {
        error = true;
        showError(0, "Username cannot be empty");
        showError(1, "Email cannot be empty");
        showError(2, "Password cannot be empty");
        showError(3, "Password cannot be empty");
        showError(4, "Need to upload image");
    }
    
    if(username == '')
    {
        error = true;
        showError(0, "Username cannot be empty");
    }
    
    if(email == '')
    {
        error = true;
        showError(1, "Email cannot be empty");
    }else if(emailDomains.includes(email) && !emailRegex.test(email))
    {
        error = true;
        showError(1, "Email is invalid");
    }
    
    if(password == '')
    {
        error = true;
        showError(2, "Password cannot be empty");
    }else if(password != '' && verifyPassword == '')
    {
        error = true;
        showError(3, "Re-enter your password");
    }else if(!passwordRegex.test(password))
    {
        error = true;
        showError(2, "Password is invalid. It must be between 8-16\ncharacters");
    }else if(password != verifyPassword)
    {
        error = true;
        showError(2, "Passwords do not match");
        showError(3, "Passwords do not match");
    }

    if(password == '' && verifyPassword == '')
    {
        error = true;
        showError(3, "Password cannot be empty");
    }
    
    
    if(img == '')
    {
        error = true;
        showError(4, "Need to upload image");
    }
    

    if (error == true){
        e.preventDefault();
    }

});


