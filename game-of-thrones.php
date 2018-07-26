<?php

function gameOfThrones ($s) {
    $letters = array_fill_keys (str_split ("abcdefghijklmnopqrstuvwxyz"), 0);
    for ($i = 0; isset ($s[$i]); $i++) ++$letters[$s[$i]];
    $num_odd_letters = 0;
    foreach ($letters as $letters_i) if ($letters_i % 2 === 1) ++$num_odd_letters;
    return $num_odd_letters <= 1 ? 'YES' : 'NO';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
$s = '';
fscanf($stdin, "%[^\n]", $s);
$result = gameOfThrones($s);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);