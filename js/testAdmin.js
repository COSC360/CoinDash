const displayByName = document.forms['displayByName'];
const displayByEmail = document.forms['displayByEmail'];
const displayByCommentId = document.forms['displayByCommentId'];

document.querySelectorAll('[id=editUserBtn]')[0].addEventListener("click", byUsernameEnableField);
document.querySelectorAll('[id=editUserBtn]')[1].addEventListener("click", byEmailEnableField);
document.querySelectorAll('[id=editUserBtn]')[2].addEventListener("click", byCommentIdEnableField);

for(var i = 0; i < displayByName.length; i++){
    displayByName[i].disabled = true;
    displayByEmail[i].disabled = true;
    displayByCommentId[i].disabled = true;
}

function byUsernameEnableField(){               
    for(var i = 0; i < displayByName.length; i++){
        displayByName[i].disabled = false;
    }
    document.querySelectorAll('[id=enableUserBtn]')[0].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=disableUserBtn]')[0].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=deleteUserBtn]')[0].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=saveUserBtn]')[0].setAttribute("style", "background-color: #2fc363;");
}
function byEmailEnableField(){                 
    for(var i = 0; i < displayByEmail.length; i++){
        displayByEmail[i].disabled = false;
    }   
    document.querySelectorAll('[id=enableUserBtn]')[1].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=disableUserBtn]')[1].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=deleteUserBtn]')[1].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=saveUserBtn]')[1].setAttribute("style", "background-color: #2fc363;");         
}
function byCommentIdEnableField(){                 
    for(var i = 0; i < displayByCommentId.length; i++){
        displayByCommentId[i].disabled = false;
    }                    
    document.querySelectorAll('[id=enableUserBtn]')[2].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=disableUserBtn]')[2].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=deleteUserBtn]')[2].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=saveUserBtn]')[2].setAttribute("style", "background-color: #2fc363;");
}
