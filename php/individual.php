
<?php
session_set_cookie_params(0);
session_start();

if(!isset($_GET["coinId"])){
    header("location: searchPage.php");
}
$coinId = $_GET["coinId"];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Main Dashboard</title>
    <link rel="stylesheet" href="../font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/individual.css">
    <script src="https://kit.fontawesome.com/e6e0351429.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/navigation.js"></script>
</head>

<body>
    <?php
        include "dashboardHeader.php";
        include "DBconnection.php";
        include "sql-queries.php";

        $userId = isset($_SESSION["id"]) ? $_SESSION["id"] : 0;
        uploadActivity($con, $userId, "viewCoin");
        updateCoinViews($con, $coinId);
    ?>
    <article class="panel full-card">
        <?php
            include "fullCoin.php";
        ?>
    </article>

    <article class="panel">
        <div class="reviews">
            <h2>Comments</h2>
            <?php
                if (isset($_SESSION["id"])){
                    echo "
                        <form class=\"comment-form\" id=\"comment-form\">
                            <p>
                                <textarea name=\"text\" class=\"comment-input\"></textarea>
                            </p>
                            <p class=\"btn-container\">
                                <button type=\"submit\" class=\"comment-btn\">Comment</button>
                            </p>
                        </form>
                    ";
                } else {
                    echo "
                        <p><a href=\"signIn.php\" class=\"comment-indicator\">Login to Comment</a></p>
                    ";
                }
            ?>
            <div id="comment-area">
            </div>
        </div>
    </article>
    <?php
        include "footer.php"
    ?>
    <script type="module" src="../js/uploadComment.js"></script>
    <script type="module" src="../js/updateComments.js"></script>
</body>

</html>