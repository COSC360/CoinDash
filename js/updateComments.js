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
                addDeleteEventListeners();
                setTimeout(function(){updateData()}, 1000);
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
                replyBtns.forEach(btn => {
                    btn.parentElement.classList.add("collapsed");
                })
                comment.classList.remove("collapsed");
                openedForms = 1;
            } else {
                comment.classList.add("collapsed");
                openedForms = 0;
                updateData(coinId);
            }
        })
    })
}

function addDeleteEventListeners(){
    var deleteBtns = document.querySelectorAll(".delete-btn");

    deleteBtns.forEach(btn => {
        var commentId = btn.parentElement.dataset.commentid;
        btn.addEventListener("click", () => {
            if (confirm("Are you sure you want to delete this user post?")){
                $.ajax({
                    url: "deleteComment.php",
                    type: "POST",
                    data: {commentId: commentId},
                })
            }
        })
    })
}

function addFormEventListeners(){
    var replyForms = document.querySelectorAll(".reply-form");

    replyForms.forEach(form => {
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            var commentId = form.parentElement.dataset.commentid;
            var text = form["text"].value;

            // Stops empty comments
            if (text == ""){
                return;
            }
            
            // Asynch request to upload comment
            $.ajax({
                url: "uploadComment.php",
                type: "POST",
                data: {coinId: coinId, text: text, parentId: commentId},
                success: function() {
                    form.reset();
                }
            })

            form.parentElement.classList.add("collapsed");
            openedForms = 0;
            updateData(coinId);
        })
    })
}