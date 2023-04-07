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
                addFormEventListeners();
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
                openedForms++;
            } else {
                comment.classList.add("collapsed");
                openedForms--;
                if (openedForms === 0){
                    updateData(coinId);
                }
            }
        })
    })
}

function addFormEventListeners(){
    var replyForms = document.querySelectorAll(".reply-form");

    replyForms.forEach(form => {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            var commentId = form.dataset.commentid;
            var text = form["text"].value;
            console.log(commentId);
            console.log(text);
            // Stops empty comments
            if (text == ""){
                return;
            }
    
            // Asynch request to upload comment
            $.ajax({
                url: "uploadComment.php",
                type: "POST",
                data: {coinId: coinId, text: text, parentId: commentId},
                success: function(response) {
                    form.reset();
                }
            })
        })
    })
}