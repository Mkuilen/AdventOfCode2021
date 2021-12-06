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

for ($days = 0; $days < 80; $days++) {
    for ($fish = 8; $fish > -1; $fish--) {
        if($fish == 0){
            $fishes[6] += $fishes[$fish];
            $fishes[8] = $fishes[$fish];
            $fishes[0] = 0;
        }else{
            $fishes[$fish -= 1] = $fishes[$fish];
        }
    }
    echo "<pre>";
    var_dump($fishes);
    echo "</pre>";
    if($days == 3){
        break;
    }
}

//echo '<pre>';
//    var_dump($fishes);
//echo '</pre>';

$totalAmountOfFishes = 0;
foreach ($fishes as $fish){
    $totalAmountOfFishes += $fish;
}

echo '<pre>';
    var_dump($totalAmountOfFishes);
echo '</pre>';