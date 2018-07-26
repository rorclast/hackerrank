<?php

function bomberMan ($n, $grid) {
    
    $number_of_rows = sizeof ($grid);
    $number_of_columns = strlen ($grid[0]);
    
    $zero_matrix = array();
    for ($i = 0; $i < $number_of_rows; $i++) :
        $zero_matrix_row = '';
        for ($j = 0; $j < $number_of_columns; $j++)
            $zero_matrix_row .= 'O';
        $zero_matrix[] = $zero_matrix_row;
    endfor;
    
    $grid_prime = $zero_matrix;
    for ($i = 0; $i < $number_of_rows; $i++) :
        $up_exists = ($i !== 0);
        $down_exists = ($i !== $number_of_rows - 1);
        for ($j = 0; $j < $number_of_columns; $j++) :
            $left_exists = ($j !== 0);
            $right_exists = ($j !== $number_of_columns - 1);
            if (substr ($grid[$i], $j, 1) === 'O') :
                $grid_prime[$i][$j] = '.';
                if ($right_exists) $grid_prime[$i][$j + 1] = '.';
                if ($up_exists) $grid_prime[$i - 1][$j] = '.';
                if ($left_exists) $grid_prime[$i][$j - 1] = '.';
                if ($down_exists) $grid_prime[$i + 1][$j] = '.';
            endif;
        endfor;
    endfor;
    
    $grid_double_prime = $zero_matrix;
    for ($i = 0; $i < $number_of_rows; $i++) :
        $up_exists = ($i !== 0);
        $down_exists = ($i !== $number_of_rows - 1);
        for ($j = 0; $j < $number_of_columns; $j++) :
            $left_exists = ($j !== 0);
            $right_exists = ($j !== $number_of_columns - 1);
            if (substr ($grid_prime[$i], $j, 1) === 'O') :
                $grid_double_prime[$i][$j] = '.';
                if ($right_exists) $grid_double_prime[$i][$j + 1] = '.';
                if ($up_exists) $grid_double_prime[$i - 1][$j] = '.';
                if ($left_exists) $grid_double_prime[$i][$j - 1] = '.';
                if ($down_exists) $grid_double_prime[$i + 1][$j] = '.';
            endif;
        endfor;
    endfor;
    
    $result = [
        0 => $zero_matrix,
        1 => $grid_double_prime,
        2 => $zero_matrix,
        3 => $grid_prime];
    
    return $n === 1 ? $grid : $result[$n % 4];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%[^\n]", $rcn_temp);
$rcn = explode(' ', $rcn_temp);
$r = intval($rcn[0]);
$c = intval($rcn[1]);
$n = intval($rcn[2]);
$grid = array();
for ($i = 0; $i < $r; $i++) {
    $grid_item = '';
    fscanf($stdin, "%[^\n]", $grid_item);
    $grid[] = $grid_item;
}
$result = bomberMan($n, $grid);
fwrite($fptr, implode("\n", $result) . "\n");
fclose($stdin);
fclose($fptr);
