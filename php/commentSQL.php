<?php
function uploadComment($con, $userId, $coinId, $text, $parentId = null){
    $commentSql = "INSERT INTO comment (coin_id, parent_comment_id, user_id, text) VALUES (?, ?, ?, ?);";

    $commentStmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($commentStmt, $commentSql)){
        // TODO:
        // header("location: REPLACE LATER");
        exit();
    }
    echo "Hello";
    mysqli_stmt_bind_param($commentStmt, "iiis", $coinId, $parentId, $userId, $text);
    mysqli_stmt_execute($commentStmt);
    mysqli_stmt_close($commentStmt);
    echo "Hello";
}

function retrieveComment($con, $coinId, $parentId = null){
    $commentSql = "SELECT * FROM comment c JOIN user_auth u ON c.user_id = u.id WHERE coin_id = ? AND parent_comment = ?";

    $commentStmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($commentStmt, $commentSql)){
        // TODO:
        // header("location: REPLACE LATER");
        exit();
    }

    mysqli_stmt_bind_param($commentStmt, "ii", $coinId, $parentId);
    mysqli_stmt_execute($commentStmt);

    $result = mysqli_stmt_get_result($commentStmt);

    if ($rows = $result -> fetch_all(MYSQLI_ASSOC)){
        // mysqli_stmt_close();
        return $rows; 
    } else {
        // mysqli_stmt_close();
        return false;
    }
}

?>