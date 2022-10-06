<?php

function maximumPerimeterTriangle($sticks) {
    rsort($sticks);
    
    for ($i = 0; $i < sizeof($sticks) - 2; $i++) {
        for ($j = $i + 1; $j < sizeof($sticks) - 1; $j++) {
            for ($k = $j + 1; $k < sizeof($sticks); $k++) {
                if ($sticks[$j] + $sticks[$k] > $sticks[$i]) {
                    return [$sticks[$k], $sticks[$j], $sticks[$i]];
                }
            }
        }
    }
    
    return [-1];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$n = intval(trim(fgets(STDIN)));
$sticks_temp = rtrim(fgets(STDIN));
$sticks = array_map('intval', preg_split('/ /', $sticks_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = maximumPerimeterTriangle($sticks);
fwrite($fptr, implode(" ", $result) . "\n");
fclose($fptr);

