<?php
function upend($text)
{
    return join('', array_reverse(preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY)));
}

function replace_words($sentence){
$array = explode(' ',$sentence );
$str = "";
foreach($array as $item){
    $str .= upend((string)$item)." ";
}
echo $str;
};
replace_words("HELLO WORDS IN");