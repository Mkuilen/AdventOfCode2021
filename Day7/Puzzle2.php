<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
set_time_limit(600);

$input = file_get_contents("../input/Day7.txt");

$inputArray = array_map('intval', explode(",", $input));

$crabPositions = $inputArray;

$totalFuelPerPosition = array();
$fuel = 0;
$maxPosition = max($crabPositions);

$time_start = microtime(true);
$totalAmountOfExtraFuel = 0;
for ($crab = 0; $crab < $maxPosition; $crab++) {
    $fuel = 0;
    foreach ($crabPositions as $position) {
        $lowestPosition = min($crab, $position);
        $highestPosition = max($crab, $position);
        $difference = $highestPosition - $lowestPosition;
        $extraFuelToAdd = 0;
        for ($i = 0; $i < $difference; $i++) {
            $extraFuelToAdd += $i;
        }
        $fuel += $difference + $extraFuelToAdd;
    }
    $totalFuelPerPosition[] = ["Position" => $crab, "Fuel" => $fuel];
    var_dump($crab);
}
$time_end = microtime(true);

$execution_time = ($time_end - $time_start) / 60;

$lowestAmountOfFuel = min(array_column($totalFuelPerPosition, "Fuel"));
echo '<pre>';
var_dump("PHP took " . $execution_time . " minutes to calculate that the minimum amount of fuel used is " . $lowestAmountOfFuel);
echo '</pre>';