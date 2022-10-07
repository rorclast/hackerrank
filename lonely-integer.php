<?php

function lonelyinteger($a) {
    $array_count_values = [];
    
    foreach ($a as $a_i) {
        if (!array_key_exists($a_i, $array_count_values)) {
            $array_count_values[$a_i] = 0;
        }
        
        ++$array_count_values[$a_i];
    }
    
    foreach ($array_count_values as $value => $count) {
        if ($count == 1)
            return $value;
    }
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$n = intval(trim(fgets(STDIN)));
$a_temp = rtrim(fgets(STDIN));
$a = array_map('intval', preg_split('/ /', $a_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = lonelyinteger($a);
fwrite($fptr, $result . "\n");
fclose($fptr);

