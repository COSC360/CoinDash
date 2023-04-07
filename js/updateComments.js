import { getURLParams } from "./utils.js";

var commentArea = document.getElementById("comment-area");

window.addEventListener("load", () => {
    // Grab coinId from url and update
    var map = getURLParams();
    var coinId = map.get("coinId");

    // Begin periodic updates
    updateData(coinId);
})

// Periodically updates the comments asynchronously
function updateData(coinId){
    $.ajax({
        url: "retrieveComments.php",
        type: "POST",
        async: true,
        data: {coinId: coinId},
        success: function(response) {
            setCommentArea(response);
            console.log("Hello");
            setTimeout(updateData(coinId), 10000)
        }
    })
}

function setCommentArea(commentsHTML){
    commentArea.innerHTML = commentsHTML;
    addReplyEventListeners();
}

function addReplyEventListeners(){
    var replyBtns = document.querySelectorAll(".reply-btn");

    replyBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            console.log("clicked")
        })
    })
}