<?php
error_reporting(E_ALL);
$array=[];
for($i = 0; $i <10; $i++){
    $random= rand(1,100);
    $array[]=$random;
}
echo "array original ";
print_r($array);
for($i = 0; $i <count($array); $i++){
    for($j = 0; $j<count($array)-1; $j++){
        if ($array[$i] < $array[$j]){
            $temp=$array[$j];
            $array[$j]=$array[$j+1];
            $array[$j+1]=$temp;
        }

    }
}
echo "array ordenano ";
print_r( $array);
?>