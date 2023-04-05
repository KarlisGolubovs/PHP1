<?php

echo "Enter two integers, please". "\n";
list($int1, $int2) = array_map('intval', explode(' ', trim(fgets(STDIN))));

function check_numbers($num1, $num2) {
    $sum = $num1 + $num2;
    $diff = abs($num1 - $num2);

    if ($num1 == 15 || $num2 == 15 || $sum == 15 || $diff == 15) {
        return true;
    } else {
        return false;
    }
}
$result = check_numbers($int1,$int2);
echo $result ? 'true' : 'false';