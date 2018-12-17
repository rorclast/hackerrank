<?php

function insertionSort2($n, $arr) {
    for($i = 1; $i < $n; $i++) {
        $numBeingSorted = $arr[$i];
        for($j = $i - 1; isset($arr[$j]) && $arr[$j] > $numBeingSorted; $j--) {
            $arr[$j + 1] = $arr[$j];
        }
        $arr[$j + 1] = $numBeingSorted;
        printArr($n, $arr);
    }
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
insertionSort2($n, $arr);   
fclose($stdin);
