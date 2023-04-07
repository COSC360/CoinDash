<?php
    session_start();
    include 'DBconnection.php';
    include 'modules.php';

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
                <div class=\"comment\" id=\"comment-1\">
                    <div class=\"main-comment\">
                        <p class=\"review-content\">".$commentData["text"]."</p>
                    </div>
                </div>
            </div>
        ";
        return $commentHTML;
    }

?>