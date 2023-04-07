<?php
session_set_cookie_params(0);
session_start();
?>
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
    <script src="../js/navigation.js"></script>
</head>

<body>
    <?php
        include "dashboardHeader.php";
        include "modules.php";
        include "utils.php";
        include "moduleModal.php";

        // Row 0 reserved for guest dashboard
        $userId = isset($_SESSION["id"]) ? $_SESSION["id"] : 0;
        uploadActivity($con, $userId, "viewDashboard");
    ?>
    <main>
        <article class="panel page-title">
            <?php
                if(isset($_SESSION['id'])){
                    echo "<h2>Home / <span id=\"breadcrumbCurrent\">".$_SESSION['username']."<span></h2>";
                }else{
                    echo "<h2>Home / Guest</h2>";
                }
            ?>
            <div class="title">
                <?php
                    if(isset($_SESSION['id'])){
                        echo "<h1>".$_SESSION['username']."'s Dashboard</h1>";
                    }else{
                        echo "<h1>Guest's Dashboard</h1>";
                    }
                ?>
                <!-- <div class="container edit-ui">
                    <img src="../svgs/edit.svg">
                </div> -->
            </div>
        </article>
        <article id="dashboard">
            <?php 
                $dashboardModules = retrieveDashboard($con, $userId);
                $moduleCount = sizeof($dashboardModules);
                $currentCount = 0;
                $previousBlock = $dashboardModules[$currentCount]["block_id"];
                echo "<script>console.log('Hello')</script>";
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

                                $coins = retrieveCoinsByCategory($con, $dashboardModules[$currentCount]["fiat"], 
                                                                        $dashboardModules[$currentCount]["category"], 
                                                                        $dashboardModules[$currentCount]["sort"],
                                                                        12, 1);
                                foreach($coins as $coin){
                                    echo 
                                    "<div class=\"product-card\">
                                        <div class=\"icon-container\">
                                            <a href=\"individual.php?coinId=".$coin["Id"]."\" class=\"icon-overlay\">
                                                <img src=\"../svgs/goto.svg\">
                                            </a>
                                        </div>
                                            <div class=\"product-image-mask\">
                                            <div class=\"product-image\" style=\"background-image: url(".$coin["img_url"].");\"></div>
                                        </div><div class=\"product-info-container\">
                                            <h3>".$coin["name"]."</h3>
                                            <strong class=\"product-price\">".number_format($coin[$dashboardModules[$currentCount]["fiat"]], 4, '.', '')." ".strtoupper($dashboardModules[$currentCount]["fiat"])." ".number_format($coin["price_change_24h"], 2, '.', '')."%</strong>
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
                         echo "</div>";
                        //          <div class=\"module-footer\">
                        //             <div class=\"prev\">
                        //                 <img class=\"prev-icon\" src=\"../svgs/arrow-left-long.svg\">
                        //                 <p>Previous</p>
                        //             </div>
                        //             <div class=\"next\">
                        //                 <p>Next</p>
                        //                 <img class=\"next-icon\" src=\"../svgs/arrow-right-long.svg\">
                        //             </div>
                        //         </div>
                        echo    "<div draggable=\"true\" class=\"module-settings-btn edit-ui\">
                                    <i class=\"fa-solid fa-ellipsis-vertical fa-lg\"></i>
                                    <i class=\"fa-solid fa-ellipsis-vertical fa-lg\"></i>
                                </div>
                            </div>";
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
    <!-- <script type="module" src="js/uploadDashboard.js"></script> -->
</body>
</html>