<?php

$error = $_SERVER["REDIRECT_STATUS"];
$error_title = '';
$error_msg = '';

if($error == 404){
    $error_title = "Page not found ! Sorry : (";
    $error_message = "Requested page not found !";
}

?>

<h1><?php echo $error_title;?></h1>
<h2><?php echo $error_message;?></h2>

