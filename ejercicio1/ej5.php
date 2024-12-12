<?php

$altura=readline("introduce la altura que tendra la piramede: ");
for($i= 1;$i<=$altura;$i++){
    for ($j = 1; $j <= $altura - $i; $j++) {
        echo" ";
    }
    for ($k = 1; $k <= $i; $k++) {
        echo $k;
    }
    for ($l = $i - 1; $l >= 1; $l--) {
        echo $l;
    }
    echo "\n";
}

?>
