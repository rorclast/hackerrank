<?php

function stringConstruction ($s) {
    return sizeof (array_unique (array_values (str_split ($s))));
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $q);
for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = '';
    fscanf($stdin, "%[^\n]", $s);
    $result = stringConstruction($s);
    fwrite($fptr, $result . "\n");
}
fclose($stdin);
fclose($fptr);