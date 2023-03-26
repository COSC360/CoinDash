import {buildModule} from "./parser.js";

var fiatSelects = document.querySelectorAll(".fiat");
var sortSelects = document.querySelectorAll(".sort");

fiatSelects.forEach(fiatSelect => {
    fiatSelect.addEventListener('change', (e) => {
        var newFiat = fiatSelect.value;
        var moduleId = fiatSelect.parentNode.parentNode.id;
        console.log(fiatSelect.parentNode);
        console.log(fiatSelect.parentNode.parentNode);
        console.log(moduleId)
        var module = buildModule(moduleId);

        $.ajax({
            url: "./retrieveModuleItems.php",
            type: "POST",
            data: {fiat: newFiat, category: module.category, sort: module.sort},
            success: function(response) {
                console.log(response);
            }
        })
    })
});

