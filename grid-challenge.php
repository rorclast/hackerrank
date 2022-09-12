<?php

function gridChallenge($grid) {
    $grid = array_map(function ($row) { return str_split($row); }, $grid);
    array_walk($grid, function (&$row) { sort($row, SORT_STRING); } );
    $n = sizeof($grid);
    $m = sizeof($grid[0]);
    
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $m; $j++) {
            if (strcmp($grid[$i][$j], $grid[$i + 1][$j]) > 0) {
                return 'NO';
            }
        }
    }
    
    return 'YES';
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$t = intval(trim(fgets(STDIN)));
for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));
    $grid = array();
    for ($i = 0; $i < $n; $i++) {
        $grid_item = rtrim(fgets(STDIN), "\r\n");
        $grid[] = $grid_item;
    }
    $result = gridChallenge($grid);
    fwrite($fptr, $result . "\n");
}
fclose($fptr);

