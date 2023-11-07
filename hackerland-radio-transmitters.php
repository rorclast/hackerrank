<?php

function hackerlandRadioTransmitters($x, $k) {
    $nodes = 0;
    $sizeX = sizeof($x);
    sort($x);
    
    for ($i = 0; $i < $sizeX; $i = $n) {
        if ($i === $sizeX - 1) {
            ++$nodes;
            break;
        } else {
            foreach (array_slice($x, $i + 1, $sizeX, true) as $j => $x_j) {
                if ($x_j - $x[$i] > $k) {
                    ++$nodes;
                    
                    foreach (array_slice($x, $j, $sizeX, true) as $l => $x_l) {
                        if ($x_l - $x[$j - 1] > $k) {
                            $n = $l;
                            break 2;
                        }
                    }
                    
                    break 2;
                } elseif ($j === $sizeX - 1) {
                    ++$nodes;
                    break 2;
                }
            }
        }
    }
    
    return $nodes;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));
$n = intval($first_multiple_input[0]);
$k = intval($first_multiple_input[1]);
$x_temp = rtrim(fgets(STDIN));
$x = array_map('intval', preg_split('/ /', $x_temp, -1, PREG_SPLIT_NO_EMPTY));
$result = hackerlandRadioTransmitters($x, $k);
fwrite($fptr, $result . "\n");
fclose($fptr);
