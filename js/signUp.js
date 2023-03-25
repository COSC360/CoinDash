let username = document.forms["RegiserForm"]["username"].value;
let password = document.forms["RegiserForm"]["email"].value;
let email = document.forms["RegiserForm"]["password"].value;
let verifyPassword = document.forms["RegiserForm"]["password"].value;
let selection = document.getElementById('selectionMenu');
let image = document.getElementById('img');
let usernameError = document.getElementById("usernameError");
let passwordError = document.getElementById("passwordError");
let emailError = document.getElementById("emailError");
let verifyPasswordError = document.getElementById("verifyPasswordError");
let selectionError = document.getElementById("selectionError");
let imageUploadError = document.getElementById("imageUploadError");

window.onload = document.getElementById
window.onload = function validateRegisterForm() {
    if(empty(username)){
        alert("Fill in the username !")
    }
}


