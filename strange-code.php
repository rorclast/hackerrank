<?php

function strangeCounter ($t) {
    $resets = floor (log (ceil ($t / 3), 2));
    return 3 * (2**$resets) + 3 * (2**$resets - 1) + 1 - $t;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%ld\n", $t);
$result = strangeCounter($t);
fwrite($fptr, $result . "\n");
fclose($stdin);
fclose($fptr);

?>