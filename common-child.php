<?php

function commonChild ($s1, $s2) {
    // Fill out the first row of the linear-programming matrix.
    $found_match = false;
    for ($j = 0; $j < strlen ($s1); $j++) :
        if (! $found_match) :
            if ($s2[0] === $s1[$j]) :
                $lp_array[0][$j] = 1;
                $found_match = true;
            else :
                $lp_array[0][$j] = 0;
            endif;
        else :
            $lp_array[0][$j] = 1;
        endif;
    endfor;
        
    // Fill out the first column of the linear-programming matrix.
    $found_match = false;
    for ($i = 0; $i < strlen ($s2); $i++) :
        if (! $found_match) :
            if ($s1[0] === $s2[$i]) :
                $lp_array[$i][0] = 1;
                $found_match = true;
            else :
                $lp_array[$i][0] = 0;
            endif;
        else :
            $lp_array[$i][0] = 1;
        endif;
    endfor;
    
    // Fill out the remaining elements of the linear-programming matrix.
    for ($i = 1; $i < strlen ($s2); $i++) :
        for ($j = 1; $j < strlen ($s1); $j++) :
            if ($s1[$j] === $s2[$i]) :
                $lp_array[$i][$j] = $lp_array[$i - 1][$j - 1] + 1;
            else :
                $lp_array[$i][$j] = max ($lp_array[$i - 1][$j], $lp_array[$i][$j - 1]);
            endif;
        endfor;
        // Unset previous rows of the matrix to reduce space-complexity.
        unset ($lp_array[$i - 2]);
    endfor;
    
    // Return the last element of the linear-programming matrix.
    return $lp_array[strlen ($s2) - 1][strlen ($s1) - 1];
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
$s1 = '';
fscanf($stdin, "%[^\n]", $s1);
$s2 = '';
fscanf($stdin, "%[^\n]", $s2);
$result = commonChild($s1, $s2);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);