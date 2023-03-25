function validateLoginForm() {
    const userOremail = document.querySelector('form[name=LoginForm] input[name= user-email]');
    const password = document.querySelector('form[name=LoginForm] input[name= pasword]');

    if(empty(userOremail)){
        userOremail.appendChild("Required Username !");
    }elseif(empty(password)){
        password.appendChild("Required Password");
    }
}