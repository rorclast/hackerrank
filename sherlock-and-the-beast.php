<?php

function decentNumber($n) {
    for ($i = 0; $i <= floor($n / 5); $i++) {
        for ($j = 0; $j <= floor($n / 3); $j++) {
            if (5 * $i + 3 * $j == $n) {
                echo str_repeat('555', $j) . str_repeat('33333', $i) . "\n";
                return;
            }
        }
    }
    
    echo "-1\n";
}

$t = intval(trim(fgets(STDIN)));
for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    $n = intval(trim(fgets(STDIN)));
    decentNumber($n);
}

