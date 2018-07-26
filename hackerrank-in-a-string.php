<?php

function hackerrankInString ($s) {
    $hackerrank = "hackerrank";
    $i_prime = 0;
    for ($i = 0; isset ($s[$i]) && $i_prime < 10; $i++)
        if ($s[$i] === $hackerrank[$i_prime]) ++$i_prime;
    return $i_prime === 10 ? 'YES' : 'NO';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $q);
for ($q_itr = 0; $q_itr < $q; $q_itr++) :
    $s = '';
    fscanf($stdin, "%[^\n]", $s);
    $result = hackerrankInString($s);
    fwrite($fptr, $result . "\n");
endfor;
fclose($stdin);
fclose($fptr);