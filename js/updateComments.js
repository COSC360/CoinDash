var commentArea = document.getElementById("comment-area");

window.addEventListener("load", () => {
    // Address of the current window
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
    console.log(coinId);
    updateData(coinId);
})

function updateData(coinId){
    $.ajax({
        url: "comment.php",
        type: "POST",
        async: true,
        data: {coinId: coinId},
        success: function(response) {
            if (response.error == ''){
                commentArea.innerHTML = response;
                console.log("Updated Data");
            }


        }
    })
}