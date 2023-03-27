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
</head>

<body>
    <?php
        include "dashboard-header.php";
        include "DBconnection.php";
        include "sql-queries.php";
    ?>
    <article class="panel full-card">
        <?php
            include "fullCoin.php";
        ?>
    </article>

    <article class="panel">
        <div class="reviews">
            <h2>Comments</h2>
            <form class="comment-form">
                <p>
                    <textarea name="text" class="comment-input"></textarea>
                </p>
                <p class="btn-container">
                    <button type="submit" class="comment-btn">Reply</button>
                </p>
            </form>
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