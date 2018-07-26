<?php

function marsExploration ($s) {
    $num_chars_altered = 0;
    $SOS = ['S', 'O', 'S'];
    for ($i = 0; isset ($s[$i]); $i++)
        if ($s[$i] !== $SOS[$i % 3]) ++$num_chars_altered;
    return $num_chars_altered;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
$s = '';
fscanf($stdin, "%[^\n]", $s);
$result = marsExploration($s);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);