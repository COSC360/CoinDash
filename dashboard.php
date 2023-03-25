<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Main Dashboard</title>
    <link rel="stylesheet" href="font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="css/var.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="stylesheet" href="css/module.css">
    <script src="https://kit.fontawesome.com/e6e0351429.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/dashboard.js"></script>
</head>

<body>
    <header class="container">
        <div class="fill-container">
            <div class="left">
                <p class="logo">
                    LOGO HERE
                </p>
            </div>
            <div class="middle">
                <nav>
                    <a href="#">Search</a>
                    <a href="#">My Dashboard</a>
                    <a href="#">Community</a>
                    <a href="#">Help</a>
                </nav>
            </div>
            <div class="right settings">
                <div class="horizontal-container fit-width">
                    <p>English-US</p>
                    <img src="images/canada-flag.png">
                    <img src="svgs/arrow-down.svg">
                </div>
                <div class="horizontal-container fit-width">
                    <p>Hi, Jason</p>
                    <img src="images/profile-picture.png">
                    <img src="svgs/arrow-down.svg">
                </div>
            </div>
        </div>
    </header>
    <main>
        <article class="panel page-title">
            <h2>Home / Jason /</h2>
            <div class="title">
                <h1>Jason's Dashboard</h1>
                <div class="container">
                    <img src="svgs/edit.svg">
                </div>
            </div>
        </article>
        <article id="dashboard">

            <?php 
                include "php/modules.php";

                $dashboardModules = retrieveDashboard($con, 1);
                $moduleCount = sizeof($dashboardModules);
                $currentCount = 0;
                $previousBlock = 0;

                while ($currentCount < $moduleCount){
                    echo "<div class=\"block panel\">";
                    echo $currentCount;
                    while ($currentCount < $moduleCount){
                        if ($previousBlock != $dashboardModules[$currentCount]["block_id"] && $currentCount == 0){
                            $previousBlock = $dashboardModules[$currentCount]["block_id"];
                            break;
                        }
                        echo "
                            <div class=\"module small\" id=\"module-1\"> 
                                <div class=\"module-header\">
                                    <div class=\"api-details\">
                                        <img class=\"api-logo-image\" src=\"images/amazon-logo-1.png\"></img>
                                        <div class=\"api-category\">/Top Products 1</div>
                                        <a class=\"icon-overlay\" href=\"#\">
                                            <img src=\"svgs/goto.svg\">
                                        </a>
                                    </div>
                                    <div class=\"dropdowns\">
                                        <select class=\"dropdown fiat\">
                                            <option selected>Deals Only</option>
                                            <option>Deals Only</option>
                                            <option>Deals Only</option>
                                            <option>Deals Only</option>
                                            <option>Deals Only</option>
                                            <option>Deals Only</option>
                                        </select>
                                        <select class=\"dropdown sort\">
                                            <option selected>Deals Only</option>
                                            <option>Deals Only</option>
                                            <option>Deals Only</option>
                                            <option>Deals Only</option>
                                            <option>Deals Only</option>
                                            <option>Deals Only</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=\"module-gallery\">
                                    
                                </div>
                                    <div class=\"module-footer\">
                                    <div class=\"prev\">
                                        <img class=\"prev-icon\" src=\"svgs/arrow-left-long.svg\">
                                        <p>Previous</p>
                                    </div>
                                    <div class=\"next\">
                                        <p>Next</p>
                                        <img class=\"next-icon\" src=\"svgs/arrow-right-long.svg\">
                                    </div>
                                </div>
                                <div draggable=\"true\" class=\"module-settings-btn\">
                                    <i class=\"fa-solid fa-ellipsis-vertical fa-lg\"></i>
                                    <i class=\"fa-solid fa-ellipsis-vertical fa-lg\"></i>
                                </div>
                            </div>
                        ";
                        $currentCount++;
                    }

                    echo "</div>";
                    
                }
                print_r($dashboardModules);
            ?>
        </article>
    </main>
    <footer>
        <a id="view-edit-btn" class="icon-overlay" href="#">
            <img src="svgs/view.svg">
        </a>
        <div class="fill-container">
            <div class="left">
                <p>Aminbhavi Suyash & Jason Ramos</p>
            </div>
            <div class="middle">
                <nav>
                    <a href="#">My Dashboard</a>
                    <a href="#">Community</a>
                    <a href="#">Help</a>
                </nav>  
            </div>
            <div class="right">
                <p href="#">© COSC 360 Group, Inc</p>
                <p href="#">Back To Top</p>
            </div>
        </div>
    </footer>
    <script src="js/modules.js"></script>
    <!-- <script type="module" src="js/uploadDashboard.js"></script> -->
</body>
</html>