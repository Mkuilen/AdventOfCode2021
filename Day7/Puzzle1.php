<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$input = file_get_contents("../input/Day7.txt");

$inputArray = array_map('intval', explode(",", $input));

$crabPositions = $inputArray;

$totalFuelPerPosition = array();
$fuel = 0;

foreach ($crabPositions as $position) {
    $fuel = 0;
    foreach ($crabPositions as $crab) {
        $lowestPosition = min($crab, $position);
        $highestPosition = max($crab, $position);
        $difference = $highestPosition - $lowestPosition;
        $fuel += $difference;
    }
    $totalFuelPerPosition[] = ["Position" => $position, "Fuel" => $fuel];
}

$lowestAmountOfFuel = min(array_column($totalFuelPerPosition, "Fuel"));

echo '<pre>';
    var_dump($lowestAmountOfFuel);
echo '</pre>';