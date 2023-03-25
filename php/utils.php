<?php

function formatNumber($num){
    echo "<script>console.log('".$num."');</script>";
    $str = strval($num);
    echo "<script>console.log('".$str."');</script>";
    return substr($str, 6);
}

?>