<?php

function twoCharaters ($s, $l) {
    $max_length = 0;
    $s_prime = [];
    for ($i = 0; $i < $l; $i++) $s_prime[$s[$i]][] = $i;
    foreach ($s_prime as $i => $s_prime_i) :
        foreach ($s_prime as $j => $s_prime_j) :
            $length = sizeof ($s_prime_i) + sizeof ($s_prime_j);
            if ($length > $max_length && $i < $j) :
                $indices = array_merge ($s_prime_i, $s_prime_j);
                asort ($indices);
                $indices = array_values ($indices);
                $size_of_indices = sizeof ($indices);
                for ($k = 0; $k < $size_of_indices - 1 && $s[$indices[$k]] !== $s[$indices[$k + 1]]; $k++) ;
                if ($k === $size_of_indices - 1) $max_length = $length;
            endif;
        endforeach;
    endforeach;
    return $max_length;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $l);
$s = '';
fscanf($stdin, "%[^\n]", $s);
$result = twoCharaters($s, $l);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);