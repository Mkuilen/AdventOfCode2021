<?php
$input = file_get_contents("../input/Day9.txt");

$inputArray = explode(PHP_EOL, $input);

$heightMap = array();

foreach ($inputArray as $item) {
    $heightMap[] = str_split(trim($item));
}

$lowestNumbers = array();
foreach ($heightMap as $heightKey => $height) {
    $excludePrevious = array();
    foreach ($height as $item) {
        $compare = min(array_diff($height, $excludePrevious));
        $compareKey = array_keys($height, $compare);
        $isLowest = array();
        if($compare === false){
            continue;
        }
        if (isset($height[$compareKey[0] - 1])) {
            if ($height[$compareKey[0] - 1] > $compare) {
                $isLowest[] = true;
            }else{
                $isLowest[] = false;
            }
        } else {
            $isLowest[] = true;
        }
        if (isset($height[$compareKey[0] + 1])) {
            if ($height[$compareKey[0] + 1] > $compare) {
                $isLowest[] = true;
            }else{
                $isLowest[] = false;
            }
        } else {
            $isLowest[] = true;
        }
        if (isset($heightMap[$heightKey - 1][$compareKey[0]])) {
            if ($heightMap[$heightKey - 1][$compareKey[0]] > $compare) {
                $isLowest[] = true;
            }else{
                $isLowest[] = false;
            }
        } else {
            $isLowest[] = true;
        }
        if (isset($heightMap[$heightKey + 1][$compareKey[0]])) {
            if ($heightMap[$heightKey + 1][$compareKey[0]] > $compare) {
                $isLowest[] = true;
            }else{
                $isLowest[] = false;
            }
        } else {
            $isLowest[] = true;
        }
        if ($isLowest == [true, true, true, true]) {
            $lowestNumbers[] = $compare;
            echo '<pre>';
                var_dump($lowestNumbers);
            echo '</pre>';
        }
        $excludePrevious[] = $compare;
    }
}

$riskLevel = 0;
foreach ($lowestNumbers as $key => &$number) {
    if ($number === false) {
        unset($lowestNumbers[$key]);
    }
    ++$number;
}

echo '<pre>';
var_dump(array_sum($lowestNumbers));
echo '</pre>';