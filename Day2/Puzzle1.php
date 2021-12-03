<?php

$input = file_get_contents("../input/Day2.txt");

$inputArray = explode(PHP_EOL, $input);

//echo "<pre>";
//    var_dump($inputArray);
//echo "</pre>";

$horizontal = 0;
$depth = 0;
foreach($inputArray as $position){
    if(strpos($position, "forward") !== false){
        $horizontal += (int) trim($position, "forward ");
    } elseif(strpos($position, "up") !== false){
        $depth -= (int) trim($position, "up ");
    } elseif(strpos($position, "down") !== false){
        $depth += (int) trim($position, "down ");
    }
}

echo "<pre>";
    var_dump($horizontal * $depth);
echo "</pre>";