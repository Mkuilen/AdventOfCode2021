<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$input = file_get_contents("../input/Day6.txt");

$inputArray = array_map('intval', explode(",", $input));

for ($days = 0; $days < 80; $days++){
    foreach ($inputArray as $index => $input){
        if($input === 0){
            $inputArray[$index] = 6;
            $inputArray[] = 8;
            continue;
        }
        $inputArray[$index] -= 1;
    }
}

echo '<pre>';
    var_dump(sizeof($inputArray));
echo '</pre>';