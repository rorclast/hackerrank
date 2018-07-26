<?php

function caesarCipher ($s, $k) {
    $lower_case = "abcdefghijklmnopqrstuvwxyz";
    $upper_case = strtoupper ($lower_case);
    $lower_case = str_split ($lower_case);
    $upper_case = str_split ($upper_case);
    for ($i = 0; isset ($s[$i]); $i++) :
        if (($i_prime = array_search ($s[$i], $lower_case)) !== FALSE)
            $s[$i] = $lower_case[($i_prime + $k) % 26];
        elseif (($i_prime = array_search ($s[$i], $upper_case)) !== FALSE)
            $s[$i] = $upper_case[($i_prime + $k) % 26];
    endfor;
    return $s;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $n);
$s = '';
fscanf($stdin, "%[^\n]", $s);
fscanf($stdin, "%d\n", $k);
$result = caesarCipher($s, $k);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);