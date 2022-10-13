<?php

function maximizingXor($l, $r) {
    $maximum = 0;
    
    for ($i = $l; $i <= $r; $i++) {
        for ($j = $l; $j <= $i; $j++) {
            $xor = [];
            $j_binary = array_reverse(str_split(decbin($j)));
            $i_binary = array_reverse(str_split(decbin($i)));
        
            for ($k = 0; $k < sizeof($i_binary); $k++) {
                $xor[] = $i_binary[$k] === ($j_binary[$k] ?? '0') ? '0' : '1';
            }
        
            $maximum = max($maximum, bindec(implode(array_reverse($xor))));
        }
    }
    
    return $maximum;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$l = intval(trim(fgets(STDIN)));
$r = intval(trim(fgets(STDIN)));
$result = maximizingXor($l, $r);
fwrite($fptr, $result . "\n");
fclose($fptr);

