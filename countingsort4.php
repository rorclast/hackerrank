<?php

function countSort($arr) {
    $result = '';
    $phi_arr = [];
    
    foreach ($arr as $i => $value_i) {
        $x = intval($value_i[0]);
        $s = $i < count($arr) / 2 ? '-' : $value_i[1];
        $phi_arr[$x][] = $s;
    }
    
    ksort($phi_arr);
    $key_min = min(array_keys($phi_arr));
    
    foreach ($phi_arr as $i => $value_i) {
        foreach ($value_i as $j => $value_j) {
            $result .= $i === $key_min && $j === 0
                ? $value_j
                : " $value_j";
        }
    }
        
    echo $result;
}

$n = intval(trim(fgets(STDIN)));
$arr = array();
for ($i = 0; $i < $n; $i++) {
    $arr_temp = rtrim(fgets(STDIN));
    $arr[] = preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY);
}
countSort($arr);
