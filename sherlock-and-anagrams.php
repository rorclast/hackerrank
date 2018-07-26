<?php

function sherlockAndAnagrams ($s) {
    $num_pairs = 0;
    for ($i = 0; isset ($s[$i]); $i++) :
        for ($j = 1; $j <= strlen ($s) - $i; $j++) :
            for ($k = $i + 1; $k <= strlen ($s) - $j; $k++) :
                $s_i = str_split (substr ($s, $i, $j));
                $s_j = str_split (substr ($s, $k, $j));
                $sum_s_i = $sum_s_j = 0;
                for ($l = 0; $l < $j; $l++) :
                    $sum_s_i += ord ($s[$i + $l]);
                    $sum_s_j += ord ($s[$k + $l]);
                endfor;
                if ($sum_s_i == $sum_s_j) :
                    sort ($s_i);
                    sort ($s_j);
                    if (implode ('', $s_i) === implode ('', $s_j)) ++$num_pairs;
                endif;
            endfor;
        endfor;
    endfor;
    return $num_pairs;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $q);
for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = '';
    fscanf($stdin, "%[^\n]", $s);
    $result = sherlockAndAnagrams($s);
    fwrite($fptr, $result . "\n");
}
fclose($stdin);
fclose($fptr);