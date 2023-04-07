var loginForm = document.forms['loginForm']; // Login Form
var loginBtn = document.getElementById("loginSubmit"); // Login button

// <i class="fa-sharp fa-solid fa-circle-check" style="color: #11e43b;"></i>
// <i class="fa-sharp fa-solid fa-circle-xmark" style="color: #ff0000;"></i>

const passwordRegex = "^[a-zA-Z]\w{8,16}$ "; //Simple password expression. The password must be at least 8 characters but no more than 16 characters long
const emailRegex = "^(.+)@([^\.].*)\.([a-z]{2,})$"; //Email validation based on current standard naming rules


function showError(inputField){

}

function hideError(inputField){

}


loginForm.addEventListener("submit",function(e){
    var requiredInput = document.querySelectorAll(".required");
    var errorText = document.querySelectorAll(".errorText");

    var loginId = requiredInput[0].textContent;
    var password = requiredInput[1].textContent;
    var err = false;

    if(loginId == '' && password == '')
    {
        err == true;
        showError(errorText[0]);
        showError(errorText[1]);
    }
    else
    {
        // onkeydown clear error
    }

    if (err == true)
    {
        e.preventDefault();
    }
});
 

// function validEntry(){

// }
