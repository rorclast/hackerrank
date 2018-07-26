<?php

function theLoveLetterMystery ($s) {
    $reductions = 0;
    $size_of_s = strlen ($s);
    for ($i = 0; $i < $size_of_s / 2; $i++)
        $reductions += abs (ord ($s[$i]) - ord ($s[$size_of_s - 1 - $i]));
    return $reductions;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $q);
for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = '';
    fscanf($stdin, "%[^\n]", $s);
    $result = theLoveLetterMystery($s);
    fwrite($fptr, $result . "\n");
}
fclose($stdin);
fclose($fptr);