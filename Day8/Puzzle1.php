<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$input = file_get_contents("../input/Day8.txt");

$inputArray = explode(PHP_EOL, $input);

$segments = array();

$zero = 6;
$one = 2;
$two = 5;
$three = 5;
$four = 4;
$five = 5;
$six = 6;
$seven = 3;
$eight = 7;
$nine = 6;

foreach ($inputArray as $item) {
    $segments[] = explode(" | ", $item);
}

$digitsThatAppear = 0;

foreach ($segments as $segment) {
    $digits = explode(" ", $segment[1]);
    foreach ($digits as $digit) {
        switch (strlen(trim($digit))) {
            case $one:
            case $four:
            case $seven:
            case $eight:
                $digitsThatAppear++;
                break;
            default:
                break;
        }
    }
}

echo '<pre>';
var_dump($digitsThatAppear);
echo '</pre>';