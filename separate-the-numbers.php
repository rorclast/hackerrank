<?php

function separateNumbers ($s) {
    $size_of_s = strlen ($s);
    $is_beautiful = false;
    for ($i = 1; $i <= $size_of_s / 2 && !$is_beautiful; $i++) :
        $first = $previous = substr ($s, 0, $i);
        $is_beautiful = true;
        for ($j = $i; $j < $size_of_s && $is_beautiful; $j += $num_digits) :
            $value = intval ($previous) + 1;
            $num_digits = floor (log ($value, 10)) + 1;
            if (substr ($s, $j, $num_digits) !== ((string) $value))
                $is_beautiful = false;
            else $previous = $value;
        endfor;
    endfor;
    $output = $is_beautiful ? 'YES ' . $first . "\n": "NO\n";
    echo $output;
}