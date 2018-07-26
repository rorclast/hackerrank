<?php
    
function isPalindrome ($s) {
    $isPalindrome = true;
    $size_of_s = strlen ($s);
    for ($i = 0; $i < $size_of_s / 2; $i++)
        if ($s[$i] !== $s[$size_of_s - $i - 1]) $isPalindrome = false;
    return $isPalindrome;
}

function palindromeIndex ($s) {
    $index = -1;
    $size_of_s = strlen ($s);
    for ($i = 0; $i < $size_of_s / 2 && $index === -1; $i++) :
        if ($s[$i] !== $s[$size_of_s - $i - 1]) :
            if (isPalindrome (substr_replace ($s, "", $i, 1)))
                $index = $i;
            if (isPalindrome (substr_replace ($s, "", $size_of_s - $i - 1, 1)))
                $index = $size_of_s - $i - 1;
        endif;
    endfor;
    return $index;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $q);
for ($q_itr = 0; $q_itr < $q; $q_itr++) {
    $s = '';
    fscanf($stdin, "%[^\n]", $s);
    $result = palindromeIndex($s);
    fwrite($fptr, $result . "\n");
}
fclose($stdin);
fclose($fptr);