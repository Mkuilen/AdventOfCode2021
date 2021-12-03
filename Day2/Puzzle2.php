<?php
$input = file_get_contents("../input/Day2.txt");

$inputArray = explode(PHP_EOL, $input);

$horizontal = 0;
$depth = 0;
$aim = 0;
foreach ($inputArray as $position) {
    if (strpos($position, "forward") !== false) {
        $value = (int)trim($position, "forward ");
        $horizontal += $value;
        $depth += $aim * $value;
    } elseif (strpos($position, "up") !== false) {
        $aim -= (int)trim($position, "up ");
    } elseif (strpos($position, "down") !== false) {
        $aim += (int)trim($position, "down ");
    }
}

echo "<pre>";
var_dump($horizontal * $depth);
echo "</pre>";