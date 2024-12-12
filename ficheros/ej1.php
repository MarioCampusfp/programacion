<?php
error_reporting(0);

$archivo=fopen("archivo.txt","r");
$contador=0;
if($archivo){
    while(($linea = fgets($archivo)) !== false){
        $contador=$contador+1;
    }
    fclose($archivo);
}
echo $contador


?>