<?php

function almostSorted ($A) {
    $size_of_A = $size_of_B = sizeof ($A);
    $A[-1] = -1;
    $A[$size_of_A] = PHP_INT_MAX;
    $B = $A;
    $is_sorted = $swap_exists = $reverse_exists = TRUE;
    $reverses = 0;
    
    for ($i = 1; $i < $size_of_A; $i++) :
        if ($A[$i - 1] > $A[$i]) $is_sorted = FALSE;
    endfor;
    
    for ($i = 0; $i < $size_of_B; $i++) :
        if ($B[$i - 1] < $B[$i] && $B[$i] > $B[$i + 1]) :
            $i_start = $i;
            while ($B[$i_start] >= $B[$i]) $i_end = $i++;
        endif;
    endfor;
    
    $temp = $B[$i_start];
    $B[$i_start++] = $B[$i_end];
    $B[$i_end++] = $temp;
    
    for ($i = 1; $i < $size_of_B; $i++) :
        if ($B[$i - 1] > $B[$i]) $swap_exists = FALSE;
    endfor;
    
    for ($j = 0; $j < $size_of_A; $j++) :
        if ($A[$j - 1] < $A[$j] && $A[$j] > $A[$j + 1]) :
            $j_start = $j;
            while ($A[$j] > $A[$j + 1]) $j_end = ++$j;
            if ($A[$j_start - 1] < $A[$j_end] && $A[$j_start++] < $A[$j_end++ + 1]) ++$reverses;
            else $reverse_exists = FALSE;
        endif;
    endfor;
    
    if ($is_sorted) $result = 'yes';
    elseif ($swap_exists) $result = "yes\nswap $i_start $i_end";
    elseif ($reverse_exists && $reverses === 1) $result = "yes\nreverse $j_start $j_end";
    else $result = 'no';
    
    printf ("%s", $result);
}

$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $n);
fscanf($stdin, "%[^\n]", $arr_temp);
$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
almostSorted($arr);
fclose($stdin);
