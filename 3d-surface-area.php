<?php

function surfaceArea ($A) {
    $surface_area = 0;
    for ($i = 0; $i < sizeof ($A); $i++) :
        for ($j = 0; $j < sizeof ($A[$i]); $j++) :
            if ($i === 0) $surface_area += $A[$i][$j];
            if ($j === 0) $surface_area += $A[$i][$j];
            if ($j < sizeof ($A[$i]) - 1) $surface_area += abs ($A[$i][$j] - $A[$i][$j + 1]);
            if ($i < sizeof ($A) - 1) $surface_area += abs ($A[$i][$j] - $A[$i + 1][$j]);
            if ($j === sizeof ($A[$i]) - 1) $surface_area += $A[$i][$j];
            if ($i === sizeof ($A) - 1) $surface_area += $A[$i][$j];
            if ($A[$i][$j] > 0) $surface_area += 2;
        endfor;
    endfor;
    return $surface_area;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%[^\n]", $HW_temp);
$HW = explode(' ', $HW_temp);
$H = intval($HW[0]);
$W = intval($HW[1]);
$A = array();
for ($i = 0; $i < $H; $i++) {
    fscanf($stdin, "%[^\n]", $A_temp);
    $A[] = array_map('intval', preg_split('/ /', $A_temp, -1, PREG_SPLIT_NO_EMPTY));
}
$result = surfaceArea($A);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);

?>