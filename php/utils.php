<?php

function formatNumber($num){
    $str = strval($num);
    echo "<script>console.log('".substr($str, 6)."');</script>";
    return substr($str, 6);
}

?>