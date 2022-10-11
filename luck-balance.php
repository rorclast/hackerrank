<?php

function luckBalance($k, $contests) {
    $luck = 0;
    
    usort($contests, function ($a, $b) {
        if ($a[1] != $b[1])
            return $a[1] == 1 ? -1 : 1; 
        
        if ($a[0] != $b[0])
            return $a[0] > $b[0] ? -1 : 1;
        
        return 0;
    });
    
    foreach ($contests as $contest) {
        if ($k > 0 && $contest[1] == 1) {
            $luck += $contest[0];
            --$k;
        } elseif ($contest[1] == 1) {
            $luck -= $contest[0];
        } else {
            $luck += $contest[0];
        }
    }
    
    return $luck;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);
$contests = array();
for ($i = 0; $i < $n; $i++) {
    $contests_temp = rtrim(fgets(STDIN));
    $contests[] = array_map('intval', preg_split('/ /', $contests_temp, -1, PREG_SPLIT_NO_EMPTY));
}
$result = luckBalance($k, $contests);
fwrite($fptr, $result . "\n");
fclose($fptr);

