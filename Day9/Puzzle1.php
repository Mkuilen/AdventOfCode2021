<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$input = file_get_contents("../input/Day9.txt");

$inputArray = explode(PHP_EOL, $input);

$heightMap = array();

foreach ($inputArray as $item) {
    $heightMap[] = str_split(trim($item));
}

$lowestNumbers = array();
foreach ($heightMap as $heightKey => $height) {
    foreach ($height as $key => $value) {
        $compareAgainst = 0;
        if (isset($height[$key - 1]) && isset($height[$key + 1])) {
            if ($height[$key - 1] > $value && $height[$key + 1] > $value) {
                $compareAgainst = $value;
            }
        } elseif (!isset($height[$key - 1]) && isset($height[$key + 1])) {
            if ($height[$key + 1] > $value) {
                $compareAgainst = $value;
            }
        } elseif (isset($height[$key - 1]) && !isset($height[$key + 1])) {
            if ($height[$key - 1] > $value) {
                $compareAgainst = $value;
            }
        }
        if(isset($heightMap[$heightKey - 1]) && isset($heightMap[$heightKey + 1])){
            if($heightMap[$heightKey - 1] > $compareAgainst && $heightMap[$heightKey + 1] > $compareAgainst){
                $lowestNumbers[] = $compareAgainst;
            }
        }elseif(!isset($heightMap[$heightKey - 1]) && isset($heightMap[$heightKey + 1])){
            if($heightMap[$heightKey + 1] > $compareAgainst){
                $lowestNumbers[] = $compareAgainst;
            }
        }elseif(isset($heightMap[$heightKey - 1]) && !isset($heightMap[$heightKey + 1])){
            if($heightMap[$heightKey - 1] > $compareAgainst){
                $lowestNumbers[] = $compareAgainst;
            }
        }
    }
}

echo "<pre>";
    var_dump($lowestNumbers);
echo "</pre>";