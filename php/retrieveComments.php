<?php
    include "commentSQL.php";
    echo "Working";
    echo $coinId;
    $comments = retrieveComment($con, $coinId);

    print_r($comments);

    $output = "";

    foreach($comments as $comment) {
        $output .= "
            <hr class=\"medium-spacing\">
            <div class=\"comment\" id=\"comment-1\">
                <div class=\"main-comment\">
                    <div class=\"comment-header\">
                        <img src=\"../images/profile-picture.png\" class=\"profile-picture\">
                        <h4 class=\"user-name\">".$comment["Username"]."</h4>
                    </div>
                    <p class=\"review-content\">".$comment["text"]."</p>
                </div>
            </div>
        ";
    }

    echo $output;
?>