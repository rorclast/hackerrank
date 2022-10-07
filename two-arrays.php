<?php

function twoArrays($k, $A, $B) {
    sort($A);
    rsort($B);
    
    foreach ($A as $i => $A_i) {
        if ($A_i + $B[$i] < $k)
            return 'NO';
    }
    
    return 'YES';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$q = intval(trim(fgets(STDIN)));

for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
    $n = intval($first_multiple_input[0]);
    $k = intval($first_multiple_input[1]);
    $A_temp = rtrim(fgets(STDIN));
    $A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));
    $B_temp = rtrim(fgets(STDIN));
    $B = array_map('intval', preg_split('/ /', $B_temp, -1, PREG_SPLIT_NO_EMPTY));
    $result = twoArrays($k, $A, $B);
    fwrite($fptr, $result . "\n");
}

fclose($fptr);

