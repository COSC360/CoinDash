<?php
session_start();
include 'DBconnection.php';
header("Content-Type: image/*");
// Do your query
$result = mysql_query('SELECT profilePicture FROM user_auth WHERE Id ='.$_SESSION["Id"].'');
$content = mysql_result($result,0);
echo $content;
?>