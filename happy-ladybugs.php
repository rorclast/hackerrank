<?php

function happyLadybugs ($b) {
    $b_prime = str_split ($b);
    $has_underscore = $has_singleton = FALSE;
    $is_solved = TRUE;
    for ($i = 0; $i < strlen ($b); $i++) :
        if ($b_prime[$i] === '_') $has_underscore = TRUE;
        elseif (substr_count ($b, $b_prime[$i]) === 1) $has_singleton = TRUE;
        elseif ($i === 0 && $b_prime[$i] !== $b_prime[$i + 1]) $is_solved = FALSE;
        elseif ($i === strlen ($b) - 1 && $b_prime[$i - 1] !== $b_prime[$i]) $is_solved = FALSE;
        elseif ($b_prime[$i] !== $b_prime[$i - 1] && $b_prime[$i] !== $b_prime[$i + 1]) $is_solved = FALSE;
    endfor;
    $result = ($has_singleton || (!$has_underscore && !$is_solved))? 'NO': 'YES';
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $g);

for ($g_itr = 0; $g_itr < $g; $g_itr++) {
    fscanf($stdin, "%d\n", $n);
    $b = '';
    fscanf($stdin, "%[^\n]", $b);
    $result = happyLadybugs($b);
    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);

?>