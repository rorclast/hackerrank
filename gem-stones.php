<?php

function gemstones ($arr) {
    $num_of_gemstones = 0;
    $size_of_arr = sizeof ($arr);
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    for ($i = 0; $i < $size_of_arr; $i++)
        for ($j = 0; $j < 26; $j++)
            $minerals[$i][$alphabet[$j]] = false;
    for ($i = 0; $i < $size_of_arr; $i++)
        for ($j = 0; isset ($arr[$i][$j]); $j++)
            $minerals[$i][$arr[$i][$j]] = true;
    for ($j = 0; $j < 26; $j++) :
        $is_gemstone = true;
        for ($i = 0; $i < $size_of_arr; $i++)
            if (!$minerals[$i][$alphabet[$j]])
                $is_gemstone = false;
        if ($is_gemstone) ++$num_of_gemstones;
    endfor;
    return $num_of_gemstones;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $n);
$arr = array();
for ($i = 0; $i < $n; $i++) {
    $arr_item = '';
    fscanf($stdin, "%[^\n]", $arr_item);
    $arr[] = $arr_item;
}
$result = gemstones($arr);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);