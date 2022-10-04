<?php

function highestValuePalindrome($s, $n, $k) {
    $differences = 0;
    $iterations = floor(($n + 1) / 2);
    
    for ($i = 0; $i < $iterations; $i++) {       
        if ($s[$i] !== $s[$n - $i - 1]) {
            $differences++;          
        }
    }
    
    if ($differences > $k) {
        return '-1';
    }    

    for ($i = 0; $i < $iterations; $i++) {
        if ($k - $differences == 0) {
            if ($s[$i] !== $s[$n - $i - 1]) {
                $s[$i] = $s[$n - $i - 1] = max($s[$i], $s[$n - $i - 1]);
                $k--;
                $differences--;
            }
        } elseif ($k - $differences == 1) {
            if (
                $s[$i] !== $s[$n - $i - 1]
                && max($s[$i], $s[$n - $i - 1]) === '9'
            ) {
                $s[$i] = $s[$n - $i - 1] = max($s[$i], $s[$n - $i - 1]);
                $k--;
                $differences--;
            }  elseif (
                $s[$i] !== $s[$n - $i - 1]
                && max($s[$i], $s[$n - $i - 1]) !== '9'
            ) {
                $s[$i] = $s[$n - $i - 1] = '9';
                $k -= 2;
                $differences--;
            } elseif (
                $i == $iterations - 1
                && $s[$i] !== '9'
                && $n % 2 == 1          
            ) {
                $s[$i] = '9';
                $k--;
            }
        } elseif ($k - $differences >= 2) {
            if (
                $s[$i] !== $s[$n - $i - 1]
                && max($s[$i], $s[$n - $i - 1]) !== '9'
            ) {
                $s[$i] = $s[$n - $i - 1] = '9';
                $k -= 2;
                $differences--;
            } elseif (
                $s[$i] !== $s[$n - $i - 1]
                && max($s[$i], $s[$n - $i - 1]) === '9'
            ) {
                $s[$i] = $s[$n - $i - 1] = max($s[$i], $s[$n - $i - 1]);
                $k--;
                $differences--;
            } elseif ( // $s[$i] === $s[$n - $i - 1]
                max($s[$i], $s[$n - $i - 1]) !== '9'
            ) {
                $s[$i] = $s[$n - $i - 1] = '9';
                $k -= $i == $iterations - 1 && $n % 2 == 1 ? 1 : 2;
            }
        }      
    }
    
    return $s;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);
$s = rtrim(fgets(STDIN), "\r\n");
$result = highestValuePalindrome($s, $n, $k);
fwrite($fptr, $result . "\n");
fclose($fptr);

