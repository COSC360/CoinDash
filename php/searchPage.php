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
    ?>
    <main>
        <article class="panel page-title">
            <h2>Home</h2>
            <div class="title">
                <?php
                    echo "<h1>Search ".(isset($_GET["like"]) ? "\"".$_GET["like"]."\"" : "All")."</h1>";
                ?>
            </div>
        </article>
        <article id="dashboard">
            <div class="panel">
            <?php 
                echo "<div class=\"module-gallery top-spacing\">";
                include "DBconnection.php";
                include "sql-queries.php";
                $like = isset($_GET["like"]) ? $_GET["like"] : "";
                $coins = retrieveCoinByLike($con, $like);

                // Notify user if like query returns false
                if (!$coins){
                    echo "<p>Oh no! Cannot find any coins!</p>";
                }

                foreach($coins as $coin){
                    echo 
                    "<div class=\"product-card\">
                        <div class=\"icon-container\">
                            <a  class=\"icon-overlay\" href=\"individual.php?coinId=".$coin["Id"]."\">
                                <img src=\"../svgs/goto.svg\">
                            </a>
                        </div>
                            <div class=\"product-image-mask\">
                            <div class=\"product-image\" style=\"background-image: url(".$coin["img_url"].");\"></div>
                        </div><div class=\"product-info-container\">
                            <h3>".$coin["name"]."</h3>
                            <strong class=\"product-price\">".number_format($coin["usd"], 4, '.', '')." USD ".number_format($coin["price_change_24h"], 2, '.', '')."%</strong>
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
  
            ?>
            </div>
        </article>
    </main>
    <?php
        include "footer.php";
    ?>
</body>
</html>