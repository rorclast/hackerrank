<?php

function jimOrders($orders) {
    $result = [];
    
    foreach ($orders as $index => $value) {
        $result[$index + 1] = array_sum($value);
    }

    asort($result);
    
    return array_keys($result);
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$n = intval(trim(fgets(STDIN)));
$orders = array();
for ($i = 0; $i < $n; $i++) {
    $orders_temp = rtrim(fgets(STDIN));
    $orders[] = array_map('intval', preg_split('/ /', $orders_temp, -1, PREG_SPLIT_NO_EMPTY));
}
$result = jimOrders($orders);
fwrite($fptr, implode(" ", $result) . "\n");
fclose($fptr);
