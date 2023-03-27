
var commentForms = document.querySelectorAll("form");

commentForms.forEach(form => {
    form.addEventListener("submit", (e) => {
        console.log("ASD");
        e.preventDefault();

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

        var text = form["text"].value;
        console.log(coinId);
        console.log(text);
        $.ajax({
            url: "uploadComment.php",
            type: "POST",
            data: {coinId: coinId, text: text},
            success: function(response) {
                form.reset();
            }
        })
    })
})

