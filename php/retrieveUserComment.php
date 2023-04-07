<?php
    session_start();

    if(isset($_SESSION["id"])){
        $userId = $_SESSION["id"];

        $userComments = retrieveUserComment($con, $userId);

        $output = "";

        foreach($userComments as $userComment) {
            $output .= getCommentHTML($con, $userComment, 0);
        }

        if ($output === ""){
            echo "<p> No comments yet!</p>";
        } else {
            echo $output;
        }
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
                        </div>
                        <p class=\"review-content\">".$commentData["text"]."</p>
                    </div>
                    <p class=\"reply-btn\">Reply</p>
                </div>
            </div>
        ";
        return $commentHTML;
    }

?>