
var commentForms = document.querySelectorAll("form");


commentForms.forEach(form => {
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        var commentId = form.parentNode.id;
        var parentId = null;
        if (commentId.startsWith("comment")){
            var parsedId = commentId.split("-");
            parentId = parsedId[1];
        }
        var coinId = "bitcoin";
        var text = form["text"].value;

        $.ajax({
            url: "../php/comment.php",
            type: "POST",
            data: {coinId: coinId, parentId: parentId, text: text},
            success: function(response) {
                console.log(response);
            }
        })
    })
})