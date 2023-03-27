<?php
session_start();
    if(isset($_POST['commentText'])){
        $commentText = $_POST['commentText'];
        //Search user by name
        $stmt = $con->prepare("UPDATE comment SET `text` = ? WHERE `id` = ?");
        $stmt->bind_param("si", $commentText,$_SESSION['postId']); 
        $stmt->execute();
    }
?>