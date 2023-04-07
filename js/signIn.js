const loginForm = document.forms['loginForm']; // Login Form
const requiredInput = document.querySelectorAll(".required");
let loginId = requiredInput[0].value;
let password = requiredInput[1].value;
var errorText = document.querySelectorAll(".errorText");
console.log(loginId);
console.log(requiredInput[0].value);

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
    console.log(loginId);
    var err = false;

    if(loginId == '' && password == '')
    {
        console.log(loginId);
        err = true;
        console.log("1");
        showError(errorText[0], "Login ID cannot be empty");
        showError(errorText[1], "Password cannot be empty");
    }else if(loginId == '')
    {
        console.log("2");
        err = true;
        showError(errorText[0], "Login ID cannot be empty");
    }else if(password == '')
    {
        console.log("3");
        err = true;
        showError(errorText[1], "Password cannot be empty");
    }

    if (err = true)
    {
        e.preventDefault();
    }else{
        e.preventDefault();
        console.log("Form passed !");
    }

});
 

// function validEntry(){

// }
