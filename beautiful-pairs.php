<?php

function beautifulPairs($A, $B) {    
    $beautifulPairs = 0;
    $n = sizeof($A);
    $A = array_count_values($A);
    $B = array_count_values($B);
    
    foreach ($A as $value => $countA) {
        $countB = $B[$value] ?? 0;
        $beautifulPairs += min($countA, $countB);
    }
    
    return $beautifulPairs == $n ? --$beautifulPairs : ++$beautifulPairs;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$n = intval(trim(fgets(STDIN)));
$A_temp = rtrim(fgets(STDIN));
$A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));
$B_temp = rtrim(fgets(STDIN));
$B = array_map('intval', preg_split('/ /', $B_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = beautifulPairs($A, $B);
fwrite($fptr, $result . "\n");
fclose($fptr);

