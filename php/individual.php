<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Main Dashboard</title>
    <link rel="stylesheet" href="../font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/individual.css">
    <script src="https://kit.fontawesome.com/e6e0351429.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../js/jquery-3.1.1.min.js"></script>
</head>

<body>
    <?php
        include "header.php"
    ?>
    <article class="panel bordered-section reviews">
        <h2>Comments</h2>
        <hr class="medium-spacing">
        <div class="comment" id="comment-1">
            <div class="main-comment">
                <div class="comment-header">
                    <img src="../images/profile-picture.png" class="profile-picture">
                    <h4 class="user-name">Jason Ramos</h4>
                </div>
                <p class="review-content">Lorem ipsum dolor sit amet consectetur. Arcu ornare quam sit lectus integer. Diam integer consequat sapien commodo velit. Sed lectus habitasse in bibendum justo turpis. Ultricies fames in nisl faucibus amet dignissim. Integer ipsum molestie a a vel. </p>
            </div>
            <i class="fa-regular fa-comment-dots fa-lg comment-btn"></i>
            <input type="text" class="comment-input">
            <div class="child-comments">
                <div class="comment" id="comment-2">
                    <div class="main-comment">
                        <div class="comment-header">
                            <img src="../images/profile-picture.png" class="profile-picture">
                            <h4 class="user-name">Jason Ramos</h4>
                        </div>
                        <p class="review-content">Lorem ipsum dolor sit amet consectetur. Arcu ornare quam sit lectus integer. Diam integer consequat sapien commodo velit. Sed lectus habitasse in bibendum justo turpis. Ultricies fames in nisl faucibus amet dignissim. Integer ipsum molestie a a vel. </p>
                    </div>
                    <i class="fa-regular fa-comment-dots fa-lg comment-btn"></i>
                    <input type="text" class="comment-input">
                    <div class="child-comments">
                    </div>

                </div>
            </div>
        </div>
        <hr class="medium-spacing">
        <div class="comment" id="comment-3">
            <div class="main-comment">
                <div class="comment-header">
                    <img src="../images/profile-picture.png" class="profile-picture">
                    <h4 class="user-name">Jason Ramos</h4>
                </div>
                <p class="review-content">Lorem ipsum dolor sit amet consectetur. Arcu ornare quam sit lectus integer. Diam integer consequat sapien commodo velit. Sed lectus habitasse in bibendum justo turpis. Ultricies fames in nisl faucibus amet dignissim. Integer ipsum molestie a a vel. </p>
            </div>
            <i class="fa-regular fa-comment-dots fa-xl comment-btn"></i>
            <p>
                <input type="text" class="comment-input">
            </p>
            <div class="child-comments">
            </div>
        </div>
    </article>
    <?php
        include "footer.php"
    ?>

</body>

</html>