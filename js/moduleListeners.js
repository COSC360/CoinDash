import {buildModule} from "./parser.js";

var fiatSelects = document.querySelectorAll(".fiat");
var sortSelects = document.querySelectorAll(".sort");

fiatSelects.forEach(fiatSelect => {
    fiatSelect.addEventListener('change', (e) => {
        var newFiat = fiatSelect.value;
        var module = fiatSelect.parentNode.parentNode.parentNode;
        var moduleObj = buildModule(module);

        $.ajax({
            url: "./retrieveModuleItems.php",
            type: "POST",
            data: {fiat: newFiat, category: moduleObj.category, sort: moduleObj.sort},
            success: function(response) {
                var coinData = JSON.parse(response);
                let newModule = "";

                coinData.forEach((coin) => {
                    console.log(coin);
                })
            }
        })
    })
});

