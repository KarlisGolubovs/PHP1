<?php

$arr = [1, 2, 3, 3.5, "hello"];

function doubleInteger(&$num) {
    if (is_int($num)) {
        $num *= 2;
    }
}

for ($i = 0; $i < count($arr); $i++) {
    doubleInteger($arr[$i]);
    echo $arr[$i] . "\n";
}
