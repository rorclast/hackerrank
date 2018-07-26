<?php

function larrysArray ($A) {
    $num_of_two_cycles = 0;
    $size_of_A = sizeof ($A);
    $B = array();
    for ($i = 1; $i <= $size_of_A; $i++) :
        $size_of_orbit = 1;
        $B[$i] = 1;
        for ($j = $A[$i - 1]; $j !== $i && !isset ($B[$j]); $j = $A[$j - 1]) :
            ++$size_of_orbit;
            $B[$j] = 1;
        endfor;
        $num_of_two_cycles += $size_of_orbit - 1;
    endfor;
    return $num_of_two_cycles % 2 === 0 ? 'YES' : 'NO';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $t);
for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%d\n", $n);
    fscanf($stdin, "%[^\n]", $A_temp);
    $A = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));
    $result = larrysArray($A);
    fwrite($fptr, $result . "\n");
}
fclose($stdin);
fclose($fptr);