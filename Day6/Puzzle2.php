<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$input = file_get_contents("../input/Day6.txt");

$inputArray = array_map('intval', explode(",", $input));

$fishes = [0, 0, 0, 0, 0, 0, 0, 0, 0];

foreach ($inputArray as $input) {
    $fishes[$input]++;
}

echo '<pre>';
    var_dump($fishes);
echo '</pre>';

for ($days = 0; $days < 256; $days++) {
    foreach ($fishes as $fishIndex => $fish) {
        if($fishIndex == 0){
            $fishes[6] += $fish;
            $fishes[8] += $fish;
            $fishes[0] = 0;
        }else{
            $fishes[$fishIndex - 1] = $fish;
        }
    }
}

echo '<pre>';
    var_dump($fishes);
echo '</pre>';

$totalAmountOfFishes = 0;
foreach ($fishes as $fish){
    $totalAmountOfFishes += $fish;
}

echo '<pre>';
    var_dump($totalAmountOfFishes);
echo '</pre>';