<?php

function funnyString ($s) {
    $output = 'Funny';
    $size_of_s = strlen ($s);
    for ($i = 1; $i < $size_of_s; $i++)
        $diffs[] = abs (ord ($s[$i - 1]) - ord ($s[$i]));
    $size_of_diffs = sizeof ($diffs);
    for ($i = 0; $i < $size_of_diffs / 2; $i++)
        if ($diffs[$i] !== $diffs[$size_of_diffs - $i - 1])
            $output = 'Not Funny';
    return $output;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $q);
for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = '';
    fscanf($stdin, "%[^\n]", $s);
    $result = funnyString($s);
    fwrite($fptr, $result . "\n");
}
fclose($stdin);
fclose($fptr);