<?php

function insertionSort1($n, $arr) {
    $numBeingSorted = $arr[$n - 1];
    for($i = $n - 2; isset($arr[$i]) && $arr[$i] > $numBeingSorted; $i--) {
        $arr[$i + 1] = $arr[$i];
        printArr($n, $arr);
    }
    $arr[$i + 1] = $numBeingSorted;
    printArr($n, $arr);
}

function printArr($n, $arr) {
    $output = '';
    for($j = 0; $j < $n; $j++) {
        $output .= "{$arr[$j]} ";
    }
    $output .= "\n";
    echo $output;
}

$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $n);
fscanf($stdin, "%[^\n]", $arr_temp);
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
insertionSort1($n, $arr);
fclose($stdin);
