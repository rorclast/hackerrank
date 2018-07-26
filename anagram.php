<?php

function anagram ($s) {
    $letters_1 = array_flip (str_split ("abcdefghijklmnopqrstuvwxyz"));
    foreach ($letters_1 as $i => $letters_1_i) $letters_1[$i] = 0;
    $letters_2 = $letters_1;
    $size_of_s = strlen ($s);
    if ($size_of_s % 2 === 0) :
        for ($i = 0; $i < $size_of_s / 2; $i++) :
            ++$letters_1[$s[$i]];
            ++$letters_2[$s[($size_of_s / 2) + $i]];
        endfor;
        $similarities = 0;
        foreach ($letters_1 as $i => $letters_1_i)
            $similarities += min ($letters_1[$i], $letters_2[$i]);
        $changes = ($size_of_s / 2) - $similarities;
    else :
        $changes = -1;
    endif;
    return $changes;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $q);
for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = '';
    fscanf($stdin, "%[^\n]", $s);
    $result = anagram($s);
    fwrite($fptr, $result . "\n");
}
fclose($stdin);
fclose($fptr);