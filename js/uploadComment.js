import { getURLParams } from "./utils.js"

var commentForm = document.getElementById("comment-form");

commentForm.addEventListener("submit", (e) => {

    e.preventDefault();
    var map = getURLParams();
    var coinId = map.get("coinId");
    var text = form["text"].value;

    // Stops empty comments
    if (text == ""){
        return;
    }

    // Asynch request to upload comment
    $.ajax({
        url: "uploadComment.php",
        type: "POST",
        data: {coinId: coinId, text: text},
        success: function(response) {
            form.reset();
        }
    })
})


