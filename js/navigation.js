
function navigateToIndividualPage(coinId){
    document.location.href = `individual.php?coinId=${coinId}`
}

function navigateToSignIn(){
    document.location.href = `signIn.php`
}

function navigateToSignUp(){
    document.location.href = `signUp.php`
}

function navigateToAccount(){
    document.location.href = `account.php`
}

function navigateToCommunity(){
    document.location.href = `community.php`
}

function topFunction(){
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}