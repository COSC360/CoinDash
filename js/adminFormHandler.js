const displayByName = document.forms['displayByName'];
const displayByEmail = document.forms['displayByEmail'];
const displayByCommentId = document.forms['displayByCommentId'];

document.querySelectorAll('[id=editUserBtn]')[0].addEventListener("click", byUsernameEnableField);
document.querySelectorAll('[id=editUserBtn]')[1].addEventListener("click", byEmailEnableField);
document.querySelectorAll('[id=editUserBtn]')[2].addEventListener("click", byCommentIdEnableField);

function enableBtn(i){
    document.querySelectorAll('[id=enableUserBtn]')[i].classList.add("addEnableBtnColor");
    document.querySelectorAll('[id=disableUserBtn]')[i].classList.add("addEnableBtnColor");
    document.querySelectorAll('[id=deleteUserBtn]')[i].classList.add("addEnableBtnColor");
    document.querySelectorAll('[id=saveUserBtn]')[i].classList.add("addEnableBtnColor");          
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
    enableBtn(0);
}
function byEmailEnableField(){                 
    for(var i = 0; i < displayByEmail.length; i++){
        displayByEmail[i].disabled = false;
    }
    enableBtn(1);            
}
function byCommentIdEnableField(){                 
    for(var i = 0; i < displayByCommentId.length; i++){
        displayByCommentId[i].disabled = false;
    }
    enableBtn(2);                    
}
