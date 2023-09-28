<?php

function sumXor($n) {
    if ($n === 0) {
        return 1;
    }
    
    $n = array_map('intval', str_split(decbin($n)));
    
    return 2 ** sizeof(array_filter($n, fn ($value) => $value === 0));
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$n = intval(trim(fgets(STDIN)));
$result = sumXor($n);
fwrite($fptr, $result . "\n");
fclose($fptr);
