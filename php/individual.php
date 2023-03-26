<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Main Dashboard</title>
    <link rel="stylesheet" href="../font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="../css/var.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/header-footer.css">
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
        <hr>
        <div class="comment">
            <div class="comment-header">
                <img src="../images/profile-picture.png">
                <h4 class="user-name">Jason Ramos</p>
            </div>
            <p class="review-content">Lorem ipsum dolor sit amet consectetur. Arcu ornare quam sit lectus integer. Diam integer consequat sapien commodo velit. Sed lectus habitasse in bibendum justo turpis. Ultricies fames in nisl faucibus amet dignissim. Integer ipsum molestie a a vel. </p>
            <div class="child-comments">
                <div class="comment">
                    <div class="comment-header">
                        <img src="../images/profile-picture.png">
                        <h4 class="user-name">Jason Ramos</p>
                    </div>
                    <p class="review-content">Lorem ipsum dolor sit amet consectetur. Arcu ornare quam sit lectus integer. Diam integer consequat sapien commodo velit. Sed lectus habitasse in bibendum justo turpis. Ultricies fames in nisl faucibus amet dignissim. Integer ipsum molestie a a vel. </p>
                    <div class="child-comments">


                    <div>
                </div>
            <div>
        </div>
        <hr>
        <div class="comment">
            <div class="comment-header">
                <img src="../images/profile-picture.png">
                <h4 class="user-name">Jason Ramos</p>
            </div>
            <p class="review-content">Lorem ipsum dolor sit amet consectetur. Arcu ornare quam sit lectus integer. Diam integer consequat sapien commodo velit. Sed lectus habitasse in bibendum justo turpis. Ultricies fames in nisl faucibus amet dignissim. Integer ipsum molestie a a vel. </p>
            <div class="child-comments">


            <div>
        </div>
    </article>
    <?php
        include "footer.php"
    ?>

</body>

</html>