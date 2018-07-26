<?php

function twoPluses ($grid) {
    $n = sizeof ($grid);
    $m = strlen ($grid[0]);
    $product_max = 0;
    for ($i = 0; $i < $n; $i++) :
        $grid[$i] = str_split ($grid[$i]);
        for ($j = 0; $j < $m; $j++) :
            for ($i_prime = 0; $i_prime < $n; $i_prime++) :
                for ($j_prime = 0; $j_prime < $m; $j_prime++) :
                    $k = 0;
                    $A_k = array();
                    while ($j + $k < $m && $grid[$i][$j + $k] === 'G'
                        && $i - $k >= 0 && $grid[$i - $k][$j] === 'G'
                        && $j - $k >= 0 && $grid[$i][$j - $k] === 'G'
                        && $i + $k < $n && $grid[$i + $k][$j] === 'G') :
                        $A_k[$i][] = $j + $k;
                        $A_k[$i - $k][] = $j;
                        $A_k[$i][] = $j - $k;
                        $A_k[$i + $k][] = $j;
                        $k_prime = 0;
                        $A_k_prime = array();
                        while ($j_prime + $k_prime < $m
                            && $grid[$i_prime][$j_prime + $k_prime] === 'G'
                            && $i_prime - $k_prime >= 0
                            && $grid[$i_prime - $k_prime][$j_prime] === 'G'
                            && $j_prime - $k_prime >= 0
                            && $grid[$i_prime][$j_prime - $k_prime] === 'G'
                            && $i_prime + $k_prime < $n
                            && $grid[$i_prime + $k_prime][$j_prime] === 'G') :
                            $A_k_prime[$i_prime][] = $j_prime + $k_prime;
                            $A_k_prime[$i_prime - $k_prime][] = $j_prime;
                            $A_k_prime[$i_prime][] = $j_prime - $k_prime;
                            $A_k_prime[$i_prime + $k_prime][] = $j_prime;
                            $product = (4 * $k + 1) * (4 * $k_prime + 1);
                            $intersection_empty = TRUE;
                            foreach ($A_k_prime as $a => $A_k_prime_a) :
                                foreach ($A_k_prime_a as $b => $A_k_prime_ab) :
                                    if (isset ($A_k[$a])
                                        && array_search ($A_k_prime_ab, $A_k[$a]) !== FALSE) :
                                        $intersection_empty = FALSE;
                                    endif;
                                endforeach;
                            endforeach;
                            if ($product > $product_max && $intersection_empty) :
                                $product_max = $product;
                            endif;
                            ++$k_prime;
                        endwhile;
                        ++$k;
                    endwhile;
                endfor;
            endfor;
        endfor;
    endfor;
    return $product_max;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%[^\n]", $nm_temp);
$nm = explode(' ', $nm_temp);
$n = intval($nm[0]);
$m = intval($nm[1]);
$grid = array();
for ($i = 0; $i < $n; $i++) {
    $grid_item = '';
    fscanf($stdin, "%[^\n]", $grid_item);
    $grid[] = $grid_item;
}
$result = twoPluses($grid);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);
