<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$input = file_get_contents("../input/Day1Puzzle1.txt");

$inputArray = explode(PHP_EOL, $input);

$previous = null;
$amountOfIncreases = 0;
$windows = [];
foreach ($inputArray as $index => $input) {
    for($i = 0; $i < 3; $i++){
        $tempArray[$i] = $inputArray[$index + $i];
    }
    array_push($windows, $tempArray);
    $tempArray = null;
}

$previous = null;
$amountOfIncreases = 0;
foreach ($windows as $window){
    $sum = array_sum($window);
    echo "<pre>";
        var_dump($sum);
        var_dump($previous);
        var_dump($sum > $previous);
    echo "</pre>";
        if($sum > $previous){
            $amountOfIncreases++;
        }
        $previous = $sum;
}

//echo "<pre>";
//var_dump($windows);
//echo "</pre>";