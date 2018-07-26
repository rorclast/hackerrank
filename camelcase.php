<?php

function camelcase ($s) {
    $number_of_words = 1;
    for ($i = 0; isset ($s[$i]); $i++)
        if (ctype_upper ($s[$i])) ++$number_of_words;
    return $number_of_words;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
$s = '';
fscanf($stdin, "%[^\n]", $s);
$result = camelcase($s);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);