<?php

function formatNumber($num){
    if ($num >= 1 || $num <= -1){
        return number_format($num, 2, '.', '');
    } else {
        return $num;
    }
}

?>