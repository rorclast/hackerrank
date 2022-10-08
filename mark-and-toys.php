<?php

function maximumToys($prices, $k) {
    sort($prices);
    $total = 0;
    $toys = 0;
    
    foreach ($prices as $price) {
        $total += $price;        
        if ($total <= $k)
            ++$toys;
    }
    
    return $toys;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);
$prices_temp = rtrim(fgets(STDIN));
$prices = array_map('intval', preg_split('/ /', $prices_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = maximumToys($prices, $k);
fwrite($fptr, $result . "\n");
fclose($fptr);

