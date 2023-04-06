const displayByName = document.forms['displayByName'];
const displayByEmail = document.forms['displayByEmail'];
const displayByCommentId = document.forms['displayByCommentId'];
const c = [document.querySelectorAll('[id=enableUserBtn]'), document.querySelectorAll('[id=disableUserBtn]'),document.querySelectorAll('[id=deleteUserBtn]'),document.querySelectorAll('[id=saveUserBtn]')];

document.querySelectorAll('[id=editUserBtn]')[0].addEventListener("click", byUsernameEnableField);
document.querySelectorAll('[id=editUserBtn]')[1].addEventListener("click", byEmailEnableField);
document.querySelectorAll('[id=editUserBtn]')[2].addEventListener("click", byCommentIdEnableField);

function addEnable(i){
    document.querySelectorAll('[id=enableUserBtn]')[i].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=disableUserBtn]')[i].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=deleteUserBtn]')[i].setAttribute("style", "background-color: #2fc363;");
    document.querySelectorAll('[id=saveUserBtn]')[i].setAttribute("style", "background-color: #2fc363;");          
}

for(var i = 0; i < displayByName.length; i++){
    displayByName[i].disabled = true;
    displayByEmail[i].disabled = true;
    displayByCommentId[i].disabled = true;
}

function byUsernameEnableField(){               
    for(var i = 0; i < displayByName.length; i++){
        displayByName[i].disabled = false;
    }
    addEnable(0);
}
function byEmailEnableField(){                 
    for(var i = 0; i < displayByEmail.length; i++){
        displayByEmail[i].disabled = false;
    }
    addEnable(1);            
}
function byCommentIdEnableField(){                 
    for(var i = 0; i < displayByCommentId.length; i++){
        displayByCommentId[i].disabled = false;
    }
    addEnable(2);                    
    // document.querySelectorAll('[id=enableUserBtn]')[2].setAttribute("style", "background-color: #2fc363;");
    // document.querySelectorAll('[id=disableUserBtn]')[2].setAttribute("style", "background-color: #2fc363;");
    // document.querySelectorAll('[id=deleteUserBtn]')[2].setAttribute("style", "background-color: #2fc363;");
    // document.querySelectorAll('[id=saveUserBtn]')[2].setAttribute("style", "background-color: #2fc363;");
}
