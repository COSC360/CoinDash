<?php
session_start();
    //Search user by name
    $stmt = $con->prepare("UPDATE comment SET `text` = ? WHERE `id` = ?");
    $stmt->bind_param("si", $_SESSION["commentText"],$_SESSION['postId']); 
    $stmt->execute();
?>