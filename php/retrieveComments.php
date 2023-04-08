<?php
    session_start();

    include "DBconnection.php";
    include "sql-queries.php";

    $coinId = $_POST["coinId"];
    $userType = isset($_SESSION["userType"]) ? $_SESSION["userType"] : 'regular';

    $comments = retrievePostComment($con, $coinId);
    
    $output = "";

    foreach($comments as $comment) {
        $output .= getCommentHTML($con, $comment, 0, $userType);
    }

    if ($output === ""){
        echo "<p> No comments yet!</p>";
    } else {
        echo $output;
    }

    function getCommentHTML($con, $commentData, $level, $userType){
        $commentHTML = "
            <div style=\"margin-left:".($level * 2)."em;\" class=\"comment-container\"> 
                <hr class=\"medium-spacing\">
                <div class=\"comment collapsed\" data-commentid=\"".$commentData["id"]."\">
                    <div class=\"main-comment\">
                        <div class=\"comment-header\">
                            <img src=\"../images/profile-picture.png\" class=\"profile-picture\">
                            <h4 class=\"user-name\">".$commentData["username"]."</h4>
                            <h4 class=\"user-name\">".$commentData["timestamp"]."</h4>
                        </div>
                        <p class=\"review-content\">".$commentData["text"]."</p>
                    </div>
                    <p class=\"reply-btn\">Reply</p> ";
                    
                    if ($userType == "admin"){
                        $commentHTML .= " | <p class=\"delete-btn\">Delete</p>";
                    }

        $commentHTML .="<form class=\"reply-form\">
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
                $commentHTML .= getCommentHTML($con, $reply, $level + 1, $userType);
            }
        }

        return $commentHTML;
    }
?>