<?php
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);  
    echo "The current page name is: ".$curPageName;  
    echo "</br>";  
?>