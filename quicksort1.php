<?php

function quickSort($arr) {
    $pivot = $arr[0];
    $left = [];
    $right = [];
    $equal = [];
    
    foreach ($arr as $value) {
        if ($value < $pivot) {
            $left[] = $value;
        } elseif ($value > $pivot) {
            $right[] = $value;
        } else {
            $equal[] = $value;
        }
    }
    
    return array_merge($left, $equal, $right);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$n = intval(trim(fgets(STDIN)));
$arr_temp = rtrim(fgets(STDIN));
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = quickSort($arr);
fwrite($fptr, implode(" ", $result) . "\n");
fclose($fptr);

