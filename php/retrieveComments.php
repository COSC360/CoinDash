<?php
    include "DBconnection.php";
    include "commentSQL.php";

    $coinId = $_POST["coinId"];
    $comments = retrieveComment($con, $coinId);

    $output = "";

    foreach($comments as $comment) {
        $output .= "
            <div class=\"comment\" id=\"comment-1\">
                <div class=\"main-comment\">
                    <div class=\"comment-header\">
                        <img src=\"../images/profile-picture.png\" class=\"profile-picture\">
                        <h4 class=\"user-name\">".$comment["Username"]."</h4>
                    </div>
                    <p class=\"review-content\">".$comment["text"]."</p>
                </div>
            </div>
            <hr class=\"medium-spacing\">
        ";
    }

    echo $output;
?>