<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Main Dashboard</title>
    <link rel="stylesheet" href="../font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/module.css">
    <script src="https://kit.fontawesome.com/e6e0351429.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/dashboard.js"></script>
</head>

<body>
    <?php
        include "dashboard-header.php";
    ?>
    <main>
        <article class="panel page-title">
            <h2>Home / Jason /</h2>
            <div class="title">
                <h1>Jason's Dashboard</h1>
                <div class="container edit-ui">
                    <img src="../svgs/edit.svg">
                </div>
            </div>
        </article>
        <article id="dashboard">
            <?php 
                include "modules.php";
                include "utils.php";
                include "moduleModal.php";

                $dashboardModules = retrieveDashboard($con, 1);
                $moduleCount = sizeof($dashboardModules);
                $currentCount = 0;
                $previousBlock = $dashboardModules[$currentCount]["block_id"];

                while ($currentCount < $moduleCount){
                    echo "<div class=\"block panel\">";
                    while ($currentCount < $moduleCount){
                        if ($previousBlock != $dashboardModules[$currentCount]["block_id"]){
                            $previousBlock = $dashboardModules[$currentCount]["block_id"];
                            break;
                        }
                        echo "
                            <div class=\"module small\" id=\"module-".$dashboardModules[$currentCount]["id"]."\"> 
                                <div class=\"module-header\">
                                    <div class=\"api-details\">
                                        <div class=\"api-category\">".$dashboardModules[$currentCount]["category"]."</div>
                                        <a class=\"icon-overlay\" href=\"#\">
                                            <img src=\"../svgs/goto.svg\">
                                        </a>    
                                    </div>
                                    <div class=\"dropdowns\">
                                        <select class=\"dropdown fiat\">";
                                            for ($i = 0; $i < sizeof($fiats); $i++){
                                                echo "<option value=\"".$fiats[$i]."\" ".($fiats[$i] == $dashboardModules[$currentCount]["fiat"] ? 'selected' : '').">".$fiatLabels[$i]."</option>";
                                            }
                        echo           "</select>
                                        <select class=\"dropdown sort\">";
                                            for ($i = 0; $i < sizeof($sortValues); $i++){
                                                echo "<option value=\"".$sortValues[$i]."\" ".($sortValues[$i] == $dashboardModules[$currentCount]["sort"] ? 'selected' : '').">".$sortLabels[$i]."</option>";
                                            }
                        echo           "</select>
                                    </div>
                                </div>
                                <div class=\"module-gallery\">";

                                $coins = retrieveAllCoins($con);
                                foreach($coins as $coin){
                                    echo 
                                    "<div class=\"product-card\">
                                        <div class=\"icon-container\">
                                            <a class=\"icon-overlay\" href=\"#\">
                                                <img src=\"../svgs/goto.svg\">
                                            </a>
                                            <a class=\"icon-overlay\" href=\"#\">
                                                <img src=\"../svgs/bookmark.svg\">
                                            </a>
                                        </div>
                                            <div class=\"product-image-mask\">
                                            <div class=\"product-image\" style=\"background-image: url(".$coin["img_url"].");\"></div>
                                        </div><div class=\"product-info-container\">
                                            <h3>".$coin["name"]."</h3>
                                            <strong class=\"product-price\">".number_format($coin[$dashboardModules[$currentCount]["fiat"]], 4, '.', '')."$  ".number_format($coin["price_change_24h"], 2, '.', '')."%</strong>
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
                                }
                        echo    "</div>
                                    <div class=\"module-footer\">
                                    <div class=\"prev\">
                                        <img class=\"prev-icon\" src=\"../svgs/arrow-left-long.svg\">
                                        <p>Previous</p>
                                    </div>
                                    <div class=\"next\">
                                        <p>Next</p>
                                        <img class=\"next-icon\" src=\"../svgs/arrow-right-long.svg\">
                                    </div>
                                </div>
                                <div draggable=\"true\" class=\"module-settings-btn edit-ui\">
                                    <i class=\"fa-solid fa-ellipsis-vertical fa-lg\"></i>
                                    <i class=\"fa-solid fa-ellipsis-vertical fa-lg\"></i>
                                </div>
                            </div>
                        ";
                        $currentCount++;
                    }
                    echo "</div>";
                }
            ?>
        </article>
    </main>
    <?php
        include "edit.php";
        include "footer.php";
    ?>
    <script type="module" src="../js/modules.js"></script>
    <script type="module" src="../js/moduleListeners.js"></script>
    <!-- <script type="module" src="js/uploadDashboard.js"></script> -->
</body>
</html>