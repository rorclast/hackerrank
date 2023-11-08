<?php

function pairs($k, $arr) {
    $result = 0;
    $sizeArr = sizeof($arr);
    
    sort($arr);
    
    for ($i = 0; $i < $sizeArr - 1; $i++) {
        for ($j = $i + 1; $j < $sizeArr && $arr[$j] - $arr[$i] <= $k; $j++) {
            if ($arr[$j] - $arr[$i] === $k) {
                ++$result;
            }
        }
    }
    
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);
$arr_temp = rtrim(fgets(STDIN));
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = pairs($k, $arr);
fwrite($fptr, $result . "\n");
fclose($fptr);
