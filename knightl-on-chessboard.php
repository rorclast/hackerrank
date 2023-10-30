<?php

function knightlOnAChessboard($n) {
    $result = [];
    
    foreach (range(1, $n - 1) as $i) {
        $result[] = [];
        foreach (range(1, $n - 1) as $j) {
            $nodesVisited = [[0,0]];
            $newNode = true;
            $newNodes = [[0,0]];
            $iteration = 1;
            
            while ($newNode) {
                $nodes = [];                
                foreach ($newNodes as $node) {
                    $modifiers = [[1,1], [1,-1], [-1,1], [-1,-1]];
                    foreach ($modifiers as $modifier) {
                        $move = [$node[0] + $modifier[0] * $i, $node[1] + $modifier[1] * $j];
                        if (($node[0] + $modifier[0] * $i) < $n
                            && ($node[1] + $modifier[1] * $j) < $n
                            && ($node[0] + $modifier[0] * $i) > -1
                            && ($node[1] + $modifier[1] * $j) > -1
                            && !in_array($move, $nodesVisited)
                        ) {
                            $nodes[] = $move;
                            $nodesVisited[] = $move;
                        }
                        
                        $move = [$node[0] + $modifier[0] * $j, $node[1] + $modifier[1] * $i];
                        if (($node[0] + $modifier[0] * $j) < $n
                            && ($node[1] + $modifier[1] * $i) < $n
                            && ($node[0] + $modifier[0] * $j) > -1
                            && ($node[1] + $modifier[1] * $i) > -1
                            && !in_array($move, $nodesVisited)
                        ) {
                            $nodes[] = $move;
                            $nodesVisited[] = $move;
                        }
                    }
                    
                    if (in_array([$n - 1, $n - 1], $nodes)) {
                       $result[$i - 1][] = $iteration;
                       break 2;
                    }
                }
                
                $newNode = count($nodes) !== 0;
                $newNodes = $nodes;
                ++$iteration;
            }
            
            if (!in_array([$n - 1, $n - 1], $nodes)) {
                $result[$i - 1][] = -1;
            }
        }
    }
    
    return $result;   
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$n = intval(trim(fgets(STDIN)));
$result = knightlOnAChessboard($n);
fwrite($fptr, implode("\n", array_map(function($arr) { return implode(' ', $arr); }, $result)) . "\n");
fclose($fptr);
