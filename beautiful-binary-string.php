<?php

function beautifulBinaryString ($b) {
    $changes = 0;
    $size_of_b = strlen ($b);
    for ($i = 0; $i < $size_of_b - 2; $i++)
        if ($b[$i] === '0' && $b[$i + 1] === '1' && $b[$i + 2] === '0') :
            $b[$i + 2] = '1';
            ++$changes;
        endif;
    return $changes;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $n);
$b = '';
fscanf($stdin, "%[^\n]", $b);
$result = beautifulBinaryString($b);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);