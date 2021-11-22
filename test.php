<?php
function give_big_size(){
    return rand(1000,2000);
}
function get_array(){
    $arr = array();
    for($i = 0; $i < give_big_size();$i++){
        $arr[] = rand();
    }
    return $arr;
}
function find_individual($arr1,$arr2){
    $list_individual = array();
    for($i = 0; $i < count($arr1);$i++){
        for($j = 0; $j < count($arr2) ;$j++){
            if($arr1[$i] != $arr2[$j]){
                $list_individual[] = $arr1[$i];
            }
        }
    }
    return $list_individual;
}
