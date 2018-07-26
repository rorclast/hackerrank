<?php

function pangrams ($s) {
    $alphabet = "abcdefghijklmnopqrstuvwxyz";
    $alphabet = str_split ($alphabet);
    $letters_array = [];
    $s = preg_replace ('/\s+/', '', $s);
    for ($i = 0; isset ($s[$i]); $i++)
        $letters_array[strtolower ($s[$i])] = 1;
    return sizeof ($letters_array) === 26 ? 'pangram' : 'not pangram';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
$s = '';
fscanf($stdin, "%[^\n]", $s);
$result = pangrams($s);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);