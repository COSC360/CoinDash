var loginId = document.getElementById("loginId"); //Login Id (Username or Email)
var password = document.getElementById("password"); // Login Password
var loginBtn = document.getElementById("loginSubmit"); // Login button
var loginForm = document.forms; // Login Form


// <i class="fa-sharp fa-solid fa-circle-check" style="color: #11e43b;"></i>
// <i class="fa-sharp fa-solid fa-circle-xmark" style="color: #ff0000;"></i>

// const emailDomains = ["gmail","yahoo","outlook"]
const passwordRegex = "^[a-zA-Z]\w{8,16}$ "; //Simple password expression. The password must be at least 8 characters but no more than 16 characters long
const emailRegex = "^(.+)@([^\.].*)\.([a-z]{2,})$"; //Email validation based on current standard naming rules
var errMsg = "";

console.log(loginForm[1]);

// loginForm.addEventListener('submit', (event) => {
//     alert('submitting');
// });


function validateLoginForm(){

}

function showError(){

}

function hideError(){

}

function validEntry(){

}
