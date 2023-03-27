import { getURLParams } from "./utils";

var commentArea = document.getElementById("comment-area");

window.addEventListener("load", () => {
    address = window.location.search
    // Returns a URLSearchParams object instance
    parameterList = new URLSearchParams(address)
    // Created a map which holds key value pairs
    let map = new Map()
    // Storing every key value pair in the map
    parameterList.forEach((value, key) => {
        map.set(key, value)
    })
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