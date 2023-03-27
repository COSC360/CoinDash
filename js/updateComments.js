import { getURLParams } from "./utils";

var commentArea = document.getElementById("comment-area");

window.addEventListener("load", () => {

    var map = getURLParams();
    
    var coinId = map.get("coinId");
    updateData(coinId);
})

function updateData(coinId){
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