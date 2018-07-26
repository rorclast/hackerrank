<?php

function absolutePermutation ($n, $k) {
    if ($k === 0) :
        for ($i = 1; $i <= $n; $i++ ) $result[$i] = $i;
    elseif (($n / (2 * $k)) - intdiv ($n, 2 * $k) == 0) :
        for ($i = 1; $i <= $n; $i += 2 * $k) :
            for ($j = 0; $j < $k; $j++) :
                $result[$i + $j] = $i + $j + $k;
                $result[$i + $j + $k] = $i + $j;
            endfor;
        endfor;
    else :
        $result = array(-1);
    endif;
    ksort ($result);
    return $result;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $t);
for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%[^\n]", $nk_temp);
    $nk = explode(' ', $nk_temp);
    $n = intval($nk[0]);
    $k = intval($nk[1]);
    $result = absolutePermutation($n, $k);
    fwrite($fptr, implode(" ", $result) . "\n");
}
fclose($stdin);
fclose($fptr);

?>