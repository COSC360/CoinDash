<?php
    include "DBconnection.php";
    include "sql-queries.php";

    $coinId = $_GET["coinId"];
    echo $coinId;
    $coin = retrieveCoinById($con, $coin);
    print_r($coin);
    $coin = $coin[0];
    
    print_r($coin);
    // echo "
    // <div class=\"product-card\">
    //     <div class=\"icon-container\">
    //         <a class=\"icon-overlay\" href=\"#\">
    //             <img src=\"../svgs/goto.svg\">
    //         </a>
    //         <a class=\"icon-overlay\" href=\"#\">
    //             <img src=\"../svgs/bookmark.svg\">
    //         </a>
    //     </div>
    //         <div class=\"product-image-mask\">
    //         <div class=\"product-image\" style=\"background-image: url(".$coin["img_url"].");\"></div>
    //     </div><div class=\"product-info-container\">
    //         <h3>".$coin["name"]."</h3>
    //         <strong class=\"product-price\">".number_format($coin["fiat"], 4, '.', '')." ".strtoupper($dashboardModules[$currentCount]["fiat"])." ".number_format($coin["price_change_24h"], 2, '.', '')."%</strong>
    //         <div class=\"price-trend-container\">
    //             <p>7D: ".number_format($coin["price_change_7d"], 2, '.', '')."%</p>
    //             <p>14D: ".number_format($coin["price_change_14d"], 2, '.', '')."%</p>
    //             <p>30D: ".number_format($coin["price_change_30d"], 2, '.', '')."%</p>
    //             <p>60D: ".number_format($coin["price_change_60d"], 2, '.', '')."%</p>
    //             <p>200D: ".number_format($coin["price_change_200d"], 2, '.', '')."%</p>
    //             <p>1Y: ".number_format($coin["price_change_1yr"], 2, '.', '')."%</p>
    //         </div>
    //     </div>
    // </div>";
    // "
?>




<!-- <div class="product-card">
    <div class="icon-container">
        <a class="icon-overlay" href="#">
            <img src="../svgs/goto.svg">
        </a>
        <a class="icon-overlay" href="#">
            <img src="../svgs/bookmark.svg">
        </a>
    </div>
        <div class="product-image-mask">
        <div class="product-image" style="background-image: url(".$coin["img_url"].");"></div>
    </div><div class="product-info-container">
        <h3>".$coin["name"]."</h3>
        <strong class="product-price">".number_format($coin[$dashboardModules[$currentCount]["fiat"]], 4, '.', '')." ".strtoupper($dashboardModules[$currentCount]["fiat"])." ".number_format($coin["price_change_24h"], 2, '.', '')."%</strong>
        <div class="price-trend-container">
            <p>7D: ".number_format($coin["price_change_7d"], 2, '.', '')."%</p>
            <p>14D: ".number_format($coin["price_change_14d"], 2, '.', '')."%</p>
            <p>30D: ".number_format($coin["price_change_30d"], 2, '.', '')."%</p>
            <p>60D: ".number_format($coin["price_change_60d"], 2, '.', '')."%</p>
            <p>200D: ".number_format($coin["price_change_200d"], 2, '.', '')."%</p>
            <p>1Y: ".number_format($coin["price_change_1yr"], 2, '.', '')."%</p>
        </div>
    </div>
</div>"; -->