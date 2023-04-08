<?php
    include "utils.php";

    $coinId = $_GET["coinId"];
    $coin = retrieveCoinById($con, $coinId);
    $coin = $coin[0];
    
    echo "
    <div class=\"product-card\">
        <div class=\"product-image-mask\">
            <div class=\"product-image\" style=\"background-image: url(".$coin["img_url"].");\"></div>
        </div>
        <div class=\"product-info-container\">
            <h3>".$coin["name"]."</h3>
            <div class=\"current-price-container\">
                <strong class=\"product-price ".getPriceColorClass($coin["price_change_24h"])."\">".number_format($coin["usd"], 4, '.', '')." USD</strong>
                <strong class=\"product-price ".getPriceColorClass($coin["price_change_24h"])."\">".number_format($coin["cad"], 4, '.', '')." CAD</strong>
                <strong class=\"product-price ".getPriceColorClass($coin["price_change_24h"])."\">".number_format($coin["eur"], 4, '.', '')." EUR</strong>
                <strong class=\"product-price ".getPriceColorClass($coin["price_change_24h"])."\">".number_format($coin["php"], 4, '.', '')." PHP</strong>
                <strong class=\"product-price ".getPriceColorClass($coin["price_change_24h"])."\">".number_format($coin["jpy"], 4, '.', '')." JPY</strong>
            </div>
            <div class=\"price-trend-container\">
                <p>7D: ".number_format($coin["price_change_7d"], 2, '.', '')."%</p>
                <p>14D: ".number_format($coin["price_change_14d"], 2, '.', '')."%</p>
                <p>30D: ".number_format($coin["price_change_30d"], 2, '.', '')."%</p>
                <p>60D: ".number_format($coin["price_change_60d"], 2, '.', '')."%</p>
                <p>200D: ".number_format($coin["price_change_200d"], 2, '.', '')."%</p>
                <p>1Y: ".number_format($coin["price_change_1yr"], 2, '.', '')."%</p>
            </div>
        </div>
    </div>";

?>
