<?php
session_start();
    $commentText = $_POST['commentText'];
    //Search user by name
    $stmt = $con->prepare("UPDATE comment SET `text` = ? WHERE `id` = ?");
    $stmt->bind_param("si", $_POST['commentText'],$_SESSION['postId']); 
    $stmt->execute();
    
?>