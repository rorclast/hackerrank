<?php

function closestNumbers($arr) {
    $result = [];
    $arrayIsSortable = sort($arr);
    $sizeOfArray = count($arr);
    $minimumDistanceBetweenElements = PHP_INT_MAX;

    if ($arrayIsSortable) {

        for ($i = 0; $i < $sizeOfArray - 1; $i++) {

            $distanceBetweenElements = abs($arr[$i] - $arr[$i + 1]);
            
            if ($distanceBetweenElements < $minimumDistanceBetweenElements) {
                $minimumDistanceBetweenElements = $distanceBetweenElements;
                $result = [$arr[$i], $arr[$i + 1]];
            }

            else if ($distanceBetweenElements == $minimumDistanceBetweenElements) {
                array_push($result, $arr[$i], $arr[$i + 1]);
            }

        }

    }

    return $result;
}

// HackerRank code.
$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $n);
fscanf($stdin, "%[^\n]", $arr_temp);
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = closestNumbers($arr);
fwrite($fptr, implode(" ", $result) . "\n");
fclose($stdin);
fclose($fptr);
