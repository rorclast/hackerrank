<?php

function gridSearch ($G, $P) {
    
    $result = 'NO';
    $size_of_G = sizeof ($G);
    $size_of_P = sizeof ($P);
    $size_of_P_i = strlen ($P[0]);
    
    for ($i = 0; $i <= $size_of_G - $size_of_P; $i++) :
        
        $j_prime = 0;
    
        while (($j = strpos ($G[$i], $P[0], $j_prime)) !== FALSE) :
            
            $i_prime = 1;
            $j_prime = $j + 1;
            
            while ($i_prime < $size_of_P &&
                substr ($G[$i + $i_prime], $j, $size_of_P_i) === $P[$i_prime]) :
            
                ++$i_prime;
    
            endwhile;
    
            if ($i_prime === $size_of_P) $result = 'YES';
        
        endwhile;
    
    endfor;
    
    return $result;
    
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$stdin = fopen("php://stdin", "r");
fscanf($stdin, "%d\n", $t);
for ($t_itr = 0; $t_itr < $t; $t_itr++) {
    fscanf($stdin, "%[^\n]", $RC_temp);
    $RC = explode(' ', $RC_temp);
    $R = intval($RC[0]);
    $C = intval($RC[1]);
    $G = array();
    for ($i = 0; $i < $R; $i++) {
        $G_item = '';
        fscanf($stdin, "%[^\n]", $G_item);
        $G[] = $G_item;
    }
    fscanf($stdin, "%[^\n]", $rc_temp);
    $rc = explode(' ', $rc_temp);
    $r = intval($rc[0]);
    $c = intval($rc[1]);
    $P = array();
    for ($i = 0; $i < $r; $i++) {
        $P_item = '';
        fscanf($stdin, "%[^\n]", $P_item);
        $P[] = $P_item;
    }
    $result = gridSearch($G, $P);
    fwrite($fptr, $result . "\n");
}

fclose($stdin);
fclose($fptr);

?>