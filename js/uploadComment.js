import { getURLParams } from "./utils.js"


var commentForms = document.querySelectorAll("form");

commentForms.forEach(form => {
    form.addEventListener("submit", (e) => {

        e.preventDefault();

        var map = getURLParams();

        var coinId = map.get("coinId");

        var text = form["text"].value;
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

