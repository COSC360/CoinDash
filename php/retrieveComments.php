<?php
    include "DBconnection.php";
    include "sql-queries.php";

    $coinId = $_POST["coinId"];
    $comments = retrievePostComment($con, $coinId);

    $output = "";

    foreach($comments as $comment) {
        $output .= getCommentHTML($con, $comment);
    }

    if ($output === ""){
        echo "<p> No comments yet!</p>";
    } else {
        echo $output;
    }


    function getCommentHTML($con, $commentData){
        $commentHTML = "
            <hr class=\"medium-spacing\">
            <div class=\"comment\" id=\"comment-1\">
                <div class=\"main-comment\">
                    <div class=\"comment-header\">
                        <img src=\"../images/profile-picture.png\" class=\"profile-picture\">
                        <h4 class=\"user-name\">".$commentData["Username"]."</h4>
                    </div>
                    <p class=\"review-content\">".$commentData["text"]."</p>
                </div>
            </div>
        ";

        $replies = retrieveCommentReplies($con, $commentData["id"]);

        if ($replies){
            foreach($replies as $reply) {
                $output .= getCommentHTML($con, $reply);
            }
        }

        return $commentHTML;
    }
?>