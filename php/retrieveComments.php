<?php
    include "DBconnection.php";
    include "sql-queries.php";

    $coinId = $_POST["coinId"];

    $comments = retrievePostComment($con, $coinId);
    
    $output = "";

    foreach($comments as $comment) {
        $output .= getCommentHTML($con, $comment, 0);
    }

    if ($output === ""){
        echo "<p> No comments yet!</p>";
    } else {
        echo $output;
    }

    function getCommentHTML($con, $commentData, $level){
        $commentHTML = "
            <div style=\"margin-left:".($level * 2)."em;\" class=\"comment-container\"> 
                <hr class=\"medium-spacing\">
                <div class=\"comment\" id=\"comment-1\">
                    <div class=\"main-comment\">
                        <div class=\"comment-header\">
                            <img src=\"../images/profile-picture.png\" class=\"profile-picture\">
                            <h4 class=\"user-name\">".$commentData["username"]."</h4>
                            <h4 class=\"user-name\">".$commentData["timestamp"]."</h4>
                        </div>
                        <p class=\"review-content\">".$commentData["text"]."</p>
                    </div>
                    <p class=\"reply-btn\">Reply</p> | 
                    <p class=\"delete-btn\">Delete</p>
                    <form class=\"reply-form\" data-commentId=\"".$commentData["id"]."\">
                        <textarea name=\"text\"></textarea>
                        <p class=\"btn-container\">
                            <button type=\"submit\" class=\"comment-btn\">Reply</button>
                        </p>
                    </form>
                </div>
            </div>
        ";

        $replies = retrieveCommentReplies($con, $commentData["id"]);
        if ($replies){
            foreach($replies as $reply) {
                $commentHTML .= getCommentHTML($con, $reply, $level + 1);
            }
        }

        return $commentHTML;
    }
?>