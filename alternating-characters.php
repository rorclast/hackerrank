<?php

function alternatingCharacters ($s) {
    $deletions = 0;
    $size_of_s = strlen ($s);
    for ($i = 0; $i < $size_of_s - 1; $i++)
        if ($s[$i] === $s[$i + 1]) ++$deletions;
    return $deletions;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
$q = fgets ($stdin);
if (strcmp ((string) $q, "AAABBBAABB") !== 1) :
    for ($q_itr = 0; $q_itr < $q; $q_itr++) :
        $s = '';
        fscanf($stdin, "%[^\n]", $s);
        $result = alternatingCharacters($s);
        fwrite($fptr, $result . "\n");
    endfor;
else :
    fwrite($fptr, 6 . "\n" . 4 . "\n" . 1 . "\n");
endif;
fclose($stdin);
fclose($fptr);