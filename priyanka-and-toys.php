<?php

function toys($w) {
    $solution = 0;
    $minimumWeight = PHP_INT_MIN;
    
    sort($w);
    
    foreach ($w as $weight) {
        if ($weight > $minimumWeight + 4) {
            ++$solution;
            $minimumWeight = $weight;
        }
    }
    
    return $solution;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$n = intval(trim(fgets(STDIN)));
$w_temp = rtrim(fgets(STDIN));
$w = array_map('intval', preg_split('/ /', $w_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = toys($w);
fwrite($fptr, $result . "\n");
fclose($fptr);

