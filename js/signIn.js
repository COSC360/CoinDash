// function validateLoginForm() {
//     const form = document.getElementById('LoginForm');
//     const userOremail= document.getElementById('user-email');
//     const password = document.getElementById('password');  

//     form.addEventListener('submit', e => {
//         e.preventDefault();
    
//         validateInputs();
//     });
    
//     const setError = (element, message) => {
//         const inputControl = element.parentElement;
//         const errorDisplay = inputControl.querySelector('.error');
    
//         errorDisplay.innerText = message;
//         inputControl.classList.add('error');
//         inputControl.classList.remove('success')
//     }
    
//     const setSuccess = element => {
//         const inputControl = element.parentElement;
//         const errorDisplay = inputControl.querySelector('.error');
    
//         errorDisplay.innerText = '';
//         inputControl.classList.add('success');
//         inputControl.classList.remove('error');
//     };
    
    
//     const validateInputs = () => {
//         const userOremail = username.value.trim();
//         const passwordValue = password.value.trim();
    
//         if(usernameValue === '') {
//             setError(username, 'Username is required');
//         } else {
//             setSuccess(username);
//         }
    
//         if(passwordValue === '') {
//             setError(password, 'Password is required');
//         } else if (passwordValue.length < 8 ) {
//             setError(password, 'Password must be at least 8 character.')
//         } else {
//             setSuccess(password);
//         }
    
//     };
    
// }