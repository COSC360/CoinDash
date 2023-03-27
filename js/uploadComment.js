
var commentForms = document.querySelectorAll("form");

commentForms.forEach(form => {
    form.addEventListener("submit", (e) => {
        console.log("ASD");
        e.preventDefault();

        var coinId = $_GET["coinId"];
        var text = form["text"].value;

        $.ajax({
            url: "uploadComment.php",
            type: "POST",
            data: {coinId: coinId, parentId: parentId, text: text},
            success: function(response) {
                console.log("Upload Successful");
            }
        })
    })
})