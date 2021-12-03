<?php
$input = file_get_contents("../input/Day3.txt");

$inputArray = explode(PHP_EOL, $input);

$verticalBinary = array();

for ($i = 0; $i < sizeof($inputArray); $i++) {
    $array = str_split($inputArray[$i]);
    foreach ($array as $index => $bit) {
        if ($bit !== "1" && $bit !== "0") {
            continue;
        }
        $verticalBinary[$index] .= $bit;
    }
}

$commonBinary = null;
$leastCommonBinary = null;

foreach ($verticalBinary as $binary) {
    $zero = substr_count($binary, "0");
    $one = substr_count($binary, "1");
    if ($zero > $one) {
        $commonBinary .= 0;
        $leastCommonBinary .= 1;
    } elseif ($one > $zero) {
        $commonBinary .= 1;
        $leastCommonBinary .= 0;
    }
}

echo '<pre>';
var_dump(bindec($commonBinary) * bindec($leastCommonBinary));
echo '</pre>';