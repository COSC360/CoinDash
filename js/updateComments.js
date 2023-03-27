import { getURLParams } from "./utils.js";

var commentArea = document.getElementById("comment-area");

window.addEventListener("load", () => {
    console.log("hello");
    // Grab coinId from url and update
    var map = getURLParams();
    var coinId = map.get("coinId");

    // Begin periodic updates
    updateData(coinId);
})

// Periodically updates the comments asynchronously
function updateData(coinId){
    console.log(coinId);
    $.ajax({
        url: "retrieveComments.php",
        type: "POST",
        async: true,
        data: {coinId: coinId},
        success: function(response) {
            commentArea.innerHTML = response;
            setTimeout(updateData(coinId), 1000)
        }
    })
}