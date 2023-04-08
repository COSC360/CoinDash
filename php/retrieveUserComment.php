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
        if($commentData["parentId"] != null){
            $commentHTML = "
            <div class = \"main-comment\">
                <p class=\"commentText\">".$commentData["text"]."</p>
                <div class =\"comment-misc-info\">
                    <p class=\"commentId\">comment id · ".$commentData["commentId"]."</p>
                    <p class=\"coinId\">coin name · ".$commentData["coin_id"]."</p>
                    <p class=\"timestamp\">timestamp · ".$commentData["timestamp"]."</p>
                </div>
            </div>
        ";
        }else{
            $commentHTML = "
            <div class = \"main-comment\">
                <p class=\"commentText\">".$commentData["text"]."</p><p class=\"reply\">REPLY COMMENT</p>
                <div class =\"comment-misc-info\">
                    <p class=\"commentId\">comment id · ".$commentData["commentId"]."</p>
                    <p class=\"coinId\">coin name · ".$commentData["coin_id"]."</p>
                    <p class=\"timestamp\">timestamp · ".$commentData["timestamp"]."</p>
                </div>
            </div>
        ";           
        }

        
        return $commentHTML;
    }

?>