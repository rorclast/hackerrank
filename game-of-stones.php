<?php

function gameOfStones($n) {
    return $n % 7 > 1 ? 'First' :'Second';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$t = intval(trim(fgets(STDIN)));
for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));
    $result = gameOfStones($n);
    fwrite($fptr, $result . "\n");
}
fclose($fptr);

