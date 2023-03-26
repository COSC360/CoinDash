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
                    newModule += `
                        "<div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="../svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="../svgs/bookmark.svg">
                                </a>
                            </div>
                                <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(${coin.img_url});"></div>
                            </div><div class="product-info-container">
                                <h3>${coin.name}</h3>
                                <strong class="product-price">${coin[newFiat].toFixed(4)}$ ${coin.price_change_24h.toFixed(2)}%</strong>
                                <div class="price-trend-container">
                                    <p>7D: ${coin.price_change_7d.toFixed(2)}%</p>
                                    <p>14D: ${coin.price_change_14d.toFixed(2)}%</p>
                                    <p>30D: ${coin.price_change_30d.toFixed(2)}%</p>
                                    <p>60D: ${coin.price_change_60d.toFixed(2)}%</p>
                                    <p>200D: ${coin.price_change_200d.toFixed(2)}%</p>
                                    <p>1Y: ${coin.price_change_1yr.toFixed(2)}%</p>
                                </div>
                            </div>
                        </div>";
                        `;
                })

                console.log(newModule);
            }
        })
    })
});

