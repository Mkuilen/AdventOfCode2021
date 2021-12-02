<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$input = file_get_contents("../input/Day1Puzzle1.txt");

$inputArray = explode(PHP_EOL, $input);

$previous = null;
$amountOfIncreases = 0;
foreach($inputArray as $depth){
    $depth = trim($depth, PHP_EOL);
    if($depth > $previous){
        $amountOfIncreases++;
    }
    $previous = $depth;
}

echo "<pre>";
    var_dump($amountOfIncreases);
echo "</pre>";