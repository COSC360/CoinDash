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
        if($commentData["parentId"] == null){
            $commentHTML = "
            <div class = \"main-comment\">
                <div class =\"comment-main-info\">
                    <img class = \"coinImg\" src=".$commentData["img_url"].">
                    <p class=\"commentText\">".$commentData["text"]."</p>
                </div>
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
                <div class =\"comment-main-info\">
                    <a href=individual.php?coinId=".$commentData["coin_id"]."><img class = \"coinImg\" src=".$commentData["img_url"]."></a>
                    <p class=\"commentText\">".$commentData["text"]."</p>
                </div>
                <div class =\"comment-misc-info\">
                    <p class=\"commentId\">comment id · ".$commentData["commentId"]."</p>
                    <p class=\"coinId\">coin name · ".$commentData["coin_id"]."</p>
                    <p class=\"timestamp\">timestamp · ".$commentData["timestamp"]."</p>
                    <p class=\"reply\">REPLY COMMENT</p>
                </div>
            </div>
        ";           
        }

        
        return $commentHTML;
    }

?>