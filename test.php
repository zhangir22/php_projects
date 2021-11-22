<?php
function give_big_size(){
    return rand(1000,2000);
}
function get_array(){
    $arr = array();
    for($i = 0; $i < give_big_size();$i++){
        $arr[] = rand(1000,2000);
    }
    return $arr;
}
function find_individual($arr1,$arr2){
    return array_diff($arr1,$arr2);
}
function show_array($arr){
    foreach($arr as $item){
        echo $item."<br>";
    }
}
$arr1 = get_array();
$arr2 = get_array();
$arr3 = find_individual($arr1,$arr2);
echo count($arr3).' '.count($arr1).' '.count($arr2);
