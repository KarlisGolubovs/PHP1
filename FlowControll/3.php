<?php

echo 'Input number please:';
$number = trim(fgets(STDIN));
$numOfdigits = strlen($number);

echo $numOfdigits;