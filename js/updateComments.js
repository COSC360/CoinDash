import { getURLParams } from "./utils.js";

var commentArea = document.getElementById("comment-area");
var openedForms = 0;
var coinId = "";

window.addEventListener("load", () => {
    // Grab coinId from url and update
    var map = getURLParams();
    coinId = map.get("coinId");

    // Begin periodic updates
    updateData();
})

// Periodically updates the comments asynchronously
function updateData(){
    $.ajax({
        url: "retrieveComments.php",
        type: "POST",
        async: true,
        data: {coinId: coinId},
        success: (response) => {
            if (openedForms === 0){
                commentArea.innerHTML = response;
                addReplyEventListeners();
                setTimeout(function(){updateData()}, 10000);
            }
        }
    })
}



function addReplyEventListeners(){
    var replyBtns = document.querySelectorAll(".reply-btn");

    replyBtns.forEach(btn => {
        var comment = btn.parentElement;
        btn.addEventListener("click", () => {
            if (comment.classList.contains("collapsed")){
                comment.classList.remove("collapsed");
                openedForms--;
                if (openedForms === 0){
                    updateData(coinId);
                }
            } else {
                comment.classList.add("collapsed");
                openedForms++;
            }
        })
    })
}