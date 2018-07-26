<?php

function isValid ($s) {
    $freq = array_count_values (str_split ($s));
    $freq = array_diff ($freq, [max ($freq)]);
    return sizeof ($freq) > 1 || (sizeof ($freq) > 0 && min ($freq) != 1) ? 'NO' : 'YES';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
$s = '';
fscanf($stdin, "%[^\n]", $s);
$result = isValid($s);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);