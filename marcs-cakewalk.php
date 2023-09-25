<?php

function marcsCakewalk($calorie) {
    rsort($calorie);
    $result = 0;
    
    foreach ($calorie as $index => $value) {
        $result += (2**($index)) * $value;
    }
    
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$n = intval(trim(fgets(STDIN)));
$calorie_temp = rtrim(fgets(STDIN));
$calorie = array_map('intval', preg_split('/ /', $calorie_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = marcsCakewalk($calorie);
fwrite($fptr, $result . "\n");
fclose($fptr);
