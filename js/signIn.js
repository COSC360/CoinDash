function validateLoginForm() {
    let user = document.forms["LoginForm"]["user-email"].value;
    let pass = document.forms["LoginForm"]["password"].value;

    form.addEventListener('submit', e => {
        e.preventDefault();
        validateInputs();
    });    
    
    const validateInputs = () => {
        const userOremail = user.value.trim();
        const password = pass.value.trim();
    
        // if (userOremail == "" && password =="") {
        //     document.getElementById("usernameEmptyError").style.opacity = "1";
        //     document.getElementById("usernameEmptyError").style.visibility = "visible";
        //     document.getElementById("usernameEmptyError").style.transition = "visibility 0s linear 0s, opacity 300ms";
        //     document.getElementById("passwordEmptyError").style.opacity = "1";
        //     document.getElementById("passwordEmptyError").style.visibility = "visible";
        //     document.getElementById("passwordEmptyError").style.transition = "visibility 0s linear 0s, opacity 300ms";
        //   return false;
        // }else if(password ==""){
        //     document.getElementById("passwordEmptyError").style.opacity = "1";
        //     document.getElementById("passwordEmptyError").style.visibility = "visible";
        //     document.getElementById("passwordEmptyError").style.transition = "visibility 0s linear 0s, opacity 300ms";
        //     return false;        
        // }
        // else if(userOremail ==""){
        //     document.getElementById("usernameEmptyError").style.opacity = "1";
        //     document.getElementById("usernameEmptyError").style.visibility = "visible";
        //     document.getElementById("usernameEmptyError").style.transition = "visibility 0s linear 0s, opacity 300ms";
        //     return false;        
        // }
      }

    
    };
    
