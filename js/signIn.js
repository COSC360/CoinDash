var loginForm = document.forms['loginForm']; // Login Form
var loginId = loginForm[0].value; //Login Id (Username or Email)
var password = loginForm[1].value; // Login Password
var loginBtn = document.getElementById("loginSubmit"); // Login button



// <i class="fa-sharp fa-solid fa-circle-check" style="color: #11e43b;"></i>
// <i class="fa-sharp fa-solid fa-circle-xmark" style="color: #ff0000;"></i>

const passwordRegex = "^[a-zA-Z]\w{8,16}$ "; //Simple password expression. The password must be at least 8 characters but no more than 16 characters long
const emailRegex = "^(.+)@([^\.].*)\.([a-z]{2,})$"; //Email validation based on current standard naming rules
var errMsg = "";

console.log(loginForm);
// loginForm.addEventListener("submit",function(e){
//     if(loginId == null && password == null){
//         displayError(false);
//     }
//     if(errState = true){
//         displayError(true);
//         e.preventDefault();
//     }
// });
 
// function displayError(errState){
//     if(errState == true){
//         showError();
//     }

//     if(errState == false){
//         hideError();
//     }   
// }

// function showError(){

// }

// function hideError(){

// }

// function validEntry(){

// }
