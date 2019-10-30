<?php
function check(... $arg){
    $noError = true;
    foreach($arg as $a){
        $noError = ($noError and isset($a) and !empty($a));
    }
    return $noError;
}

function selectCurrentTab($type){
    $arr = array_values($type);
    for($i = 0, $cur_tab = 1; $i < count($arr); ++$i) if($arr[$i] != 1) $cur_tab = $i+1;
    return $cur_tab;
}