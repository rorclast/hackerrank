<?php

function minimumNumber ($n, $password) {
    $password = str_split ($password);
    $numbers_needed = 1 - min (1, count (
        array_intersect ($password, str_split ("0123456789"))));
    $lower_case_needed = 1 - min (1, count (
        array_intersect ($password, str_split ("abcdefghijklmnopqrstuvwxyz"))));
    $upper_case_needed = 1 - min (1, count (
        array_intersect ($password, str_split ("ABCDEFGHIJKLMNOPQRSTUVWXYZ"))));
    $special_characters_needed = 1 - min (1, count (
        array_intersect ($password, str_split ("!@#$%^&*()-+"))));
    $sum_needed = $numbers_needed + $lower_case_needed +
        $upper_case_needed + $special_characters_needed;
    return max ($sum_needed, 6 - $n);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $n);
$password = '';
fscanf($stdin, "%[^\n]", $password);
$answer = minimumNumber($n, $password);
fwrite($fptr, $answer . "\n");
fclose($stdin);
fclose($fptr);