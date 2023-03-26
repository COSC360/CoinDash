<?php
    include "commentSQL.php";
    echo "Working";
    echo $coinId;
    $comments = retrieveComment($con, $coinId);

    print_r($comments);
?>



<!-- <hr class="medium-spacing">
<div class="comment" id="comment-1">
    <div class="main-comment">
        <div class="comment-header">
            <img src="../images/profile-picture.png" class="profile-picture">
            <h4 class="user-name">Jason Ramos</h4>
        </div>
        <p class="review-content">Lorem ipsum dolor sit amet consectetur. Arcu ornare quam sit lectus integer. Diam integer consequat sapien commodo velit. Sed lectus habitasse in bibendum justo turpis. Ultricies fames in nisl faucibus amet dignissim. Integer ipsum molestie a a vel. </p>
    </div>
    <i class="fa-regular fa-comment-dots fa-lg comment-btn"></i>
    <form class="comment-form">
        <p>
            <input type="text" name="text" class="comment-input">
        </p>
        <p>
            <button type="submit">Reply</button>
        </p>
    </form>
</div> -->