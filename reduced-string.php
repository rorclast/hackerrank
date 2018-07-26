<?php

function super_reduced_string ($s) {
    $size_of_s = strlen ($s);
    $i = 0;
    while ($i < $size_of_s - 1) :
        if ($s[$i] === $s[$i + 1]) :
            $s = substr_replace ($s, "", $i, 2);
            $size_of_s = strlen ($s);
            $i = max (--$i, 0);
        else :
            ++$i;
        endif;
    endwhile;  
    return strlen ($s) === 0 ? 'Empty String' : $s;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
$s = '';
fscanf($stdin, "%[^\n]", $s);
$result = super_reduced_string($s);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);