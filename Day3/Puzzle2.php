<?php
$input = file_get_contents("../input/Day3.txt");

$inputArray = explode(PHP_EOL, $input);

$verticalBinary = array();

function binaryToVertical($inArray): array
{
    $verticalBinary = array();
    for ($i = 0; $i < sizeof($inArray); $i++) {
        $array = str_split($inArray[$i]);
        foreach ($array as $index => $bit) {
            if ($bit !== "1" && $bit !== "0") {
                continue;
            }
            $verticalBinary[$index] .= $bit;
        }
    }
    return $verticalBinary;
}

$verticalBinary = binaryToVertical($inputArray);

$oxygenArray = $inputArray;
$co2Array = $inputArray;

$itemsLeft = sizeof($oxygenArray);

$removedValues = array();

$position = 0;
while ($itemsLeft > 1) {
    $removedValues = array();

    $zero = substr_count($verticalBinary[$position], "0");
    $one = substr_count($verticalBinary[$position], "1");

    foreach ($oxygenArray as $binary) {
        if ($zero > $one) {
            if (strpos($binary, "0", $position) != $position) {
                $removedValues[] = $binary;
            }
        } else {
            if (strpos($binary, "1", $position) != $position) {
                $removedValues[] = $binary;
            }
        }
    }

    $removedValues = array_unique($removedValues);
    $oxygenArray = array_diff($oxygenArray, $removedValues);
    $oxygenArray = array_values($oxygenArray);
    $verticalBinary = binaryToVertical($oxygenArray);
    $itemsLeft = sizeof($oxygenArray);

    $position++;
}

$oxygenRating = (float)$oxygenArray[0];

$itemsLeft = sizeof($co2Array);

$position = 0;
while ($itemsLeft > 1) {
    $removedValues = array();

    $zero = substr_count($verticalBinary[$position], "0");
    $one = substr_count($verticalBinary[$position], "1");

    foreach ($co2Array as $binary) {
        if ($one < $zero) {
            if (strpos($binary, "1", $position) != $position) {
                $removedValues[] = $binary;
            }
        } else {
            if (strpos($binary, "0", $position) != $position) {
                $removedValues[] = $binary;
            }
        }
    }

    $removedValues = array_unique($removedValues);
    $co2Array = array_diff($co2Array, $removedValues);
    $co2Array = array_values($co2Array);
    $verticalBinary = binaryToVertical($co2Array);
    $itemsLeft = sizeof($co2Array);

    $position++;
}

$co2Rating = (float)$co2Array[0];

echo '<pre>';
    var_dump(bindec($oxygenRating) * bindec($co2Rating));
echo '</pre>';