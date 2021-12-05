<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$input = file_get_contents("../input/Day5.txt");

$inputArray = explode(PHP_EOL, $input);
$lines = array();

for ($i = 0; $i < sizeof($inputArray); $i++){
    $lines[$i] = preg_split('/\s+/', $inputArray[$i], -1, PREG_SPLIT_NO_EMPTY);
}

$points = array();
foreach ($lines as $line){
    $points1 = explode(",", $line[0]);
    $points2 = explode(",", $line[2]);
    if($points1[0] == $points2[0]){
        $smallestPoint = min($points1[1], $points2[1]);
        $biggestPoint = max($points1[1], $points2[1]);
        for ($i = $smallestPoint; $i <= $biggestPoint; $i++){
            $points[] = $i . "," . $points1[0];
        }
    }elseif($points1[1] == $points2[1]){
        $smallestPoint = min($points1[0], $points2[0]);
        $biggestPoint = max($points1[0], $points2[0]);
        for ($i = $smallestPoint; $i <= $biggestPoint; $i++){
            $points[] = $points1[1] . "," . $i;
        }
    }
}

$totalOverlappingPoints = array_count_values($points);

$totalAmountOfOverlappingPoints = 0;

foreach ($totalOverlappingPoints as $overlappingPoint){
    if($overlappingPoint > 1){
        $totalAmountOfOverlappingPoints++;
    }
}

echo '<pre>';
    var_dump($totalAmountOfOverlappingPoints);
echo '</pre>';