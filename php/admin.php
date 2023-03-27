<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/module.css">
    <link rel="stylesheet" href="../css/individual.css">
    <script src="https://kit.fontawesome.com/e6e0351429.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
        include "dashboard-header.php";
        include "DBconnection.php";
        include "sql-queries.php";
    ?>
<main>    
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
</main>    
    <script src="../js/comment.js"></script>
    <script src="../js/updateComments.js"></script>
</main>
</body>
</html>