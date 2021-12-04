<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require("../Day3/Puzzle2.php");

$input = file_get_contents("../input/Day4.txt");

$inputArray = explode(PHP_EOL, $input);

$calledNumbers = $inputArray[0];
$cards = array();

$j = 0;
$x = 0;
for ($i = 2; $i < sizeof($inputArray); $i++) {
    if (preg_match('/[0-9]/', $inputArray[$i])) {
        $cards[$x][$j] = preg_split('/\s+/', $inputArray[$i], -1, PREG_SPLIT_NO_EMPTY);
        $j++;
    }
    if ($j >= 5) {
        $j = 0;
        $x++;
    }
}

$calledNumbers = explode(",", $calledNumbers);
$bingoNumbers = array();
$numberList = "";
$verticalCard = null;

$cardsWithBingo = array();

foreach ($calledNumbers as $numberIndex => $number) {
    foreach ($cards as $cardIndex => $card) {
        if(array_search($cardIndex, $cardsWithBingo)){
            continue;
        }
        $verticalCard = rowToVertical($card);
        foreach ($verticalCard as $vertical) {
            $verticalBingoCount = 0;
            foreach ($vertical as $bingo) {
                if ($bingo == "BINGO") {
                    $verticalBingoCount++;
                }
            }
            if ($verticalBingoCount == 5) {
                if(!in_array($cardIndex, $cardsWithBingo)){
                    $cardsWithBingo[] = $cardIndex;
                }
                $verticalBingoCount = 0;
                if(sizeof($cardsWithBingo) == sizeof($cards)){
                    echo "VERTICAL Bingo on card nr. " . $cardIndex . " and on row nr. " . $rowIndex;
                    $bingoCard = [$cardIndex, $rowIndex, TRUE];
                    $winningNumber = $calledNumbers[$numberIndex - 1];
                    break;
                }
            }
        }
        if(sizeof($cardsWithBingo) == sizeof($cards)){
            break;
        }
        foreach ($card as $rowIndex => $row) {
            $bingoCount = 0;
            foreach ($row as $bingo) {
                if ($bingo == "BINGO") {
                    $bingoCount++;
                }
            }
            if ($bingoCount == 5) {
                if(!in_array($cardIndex, $cardsWithBingo)){
                    $cardsWithBingo[] = $cardIndex;
                }
                $bingoCount = 0;
                if(sizeof($cardsWithBingo) == sizeof($cards)){
                    echo "Bingo on card nr. " . $cardIndex . " and on row nr. " . $rowIndex;
                    $bingoCard = [$cardIndex, $rowIndex, TRUE];
                    $winningNumber = $calledNumbers[$numberIndex - 1];
                    break;
                }
            }

            foreach ($row as $itemIndex => $item) {
                if ($item == $number) {
                    $cards[$cardIndex][$rowIndex][$itemIndex] = "BINGO";
                }
            }
            if (sizeof($cardsWithBingo) == sizeof($cards)) {
                break;
            }
        }
        if (sizeof($cardsWithBingo) == sizeof($cards)) {
            break;
        }
    }
    if (sizeof($cardsWithBingo) == sizeof($cards)) {
        break;
    }
}

if($bingoCard[2] == TRUE){
    $cardOnWhichBingo = $verticalCard;
} else {
    $cardOnWhichBingo = $cards[$bingoCard[0]];
}

$winningScore = 0;
foreach ($cardOnWhichBingo as $card){
    foreach($card as $number){
        if($number != "BINGO"){
            $winningScore += (int)$number;
        }
    }
}

echo '<pre>';
var_dump($winningScore * $winningNumber);
echo '</pre>';

function rowToVertical($inArray): array
{
    $verticalRow = array();
    foreach ($inArray as $row) {
        foreach ($row as $index => $item) {
            $verticalRow[$index][] = $item;
        }
    }
    return $verticalRow;
}
