<?php 

function dataParaPtBr($dataMysql){
    $a = explode("-", $dataMysql);
    $dataPtBr = $a[2]."/".$a[1]."/".$a[0];
    return $dataPtBr;
} 