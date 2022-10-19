<?php

function flippingBits($n) {
    $solution = [];
    $n_binary = array_reverse(str_split(decbin($n)));
    
    for ($i = 0; $i < 32; $i++) {
        if (isset($n_binary[$i])) {
            $solution[$i] = $n_binary[$i] == '0' ? '1' : '0';
        } else {
            $solution[$i] = '1';
        }
    }
    
    return bindec(implode(array_reverse($solution)));
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$q = intval(trim(fgets(STDIN)));
for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $n = intval(trim(fgets(STDIN)));
    $result = flippingBits($n);
    fwrite($fptr, $result . "\n");
}
fclose($fptr);

