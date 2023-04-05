<?php


for ($i = 1; $i <= 110; $i++) {
    $output = "";
    if ($i % 3 == 0) {
        $output .= "Coza";
    }
    if ($i % 5 == 0) {
        $output .= "Loza";
    }
    if ($i % 7 == 0) {
        $output .= "Woza";
    }
    if ($output == "") {
        $output = $i;
    }
    echo $output . " ";
    if ($i % 11 == 0) {
        echo "\n";
    }
}
