<?php
declare(strict_types=1);

/**
 * @param array $array
 * @return int
 * @throws Exception
 */
function maxValue(array $array): int {
    if (count($array) === 0) {
        throw new Exception("Array cannot be empty");
    }

    $maxValue = $array[0];

    foreach ($array as $value) {
        if ($value > $maxValue) {
            $maxValue = $value;
        }
    }

    return $maxValue;
}

/**
 * @param array $array
 * @return int
 * @throws Exception
 */
function minValue(array $array): int {
    if (count($array) === 0) {
        throw new Exception("Array cannot be empty");
    }

    $minValue = $array[0];

    foreach ($array as $value) {
        if ($value < $minValue) {
            $minValue = $value;
        }
    }

    return $minValue;
}

/**
 * @param array $array
 * @return int
 */
function sumValue(array $array): int {
    $sumValue = 0;

    foreach ($array as $value) {
        $sumValue += $value;
    }

    return $sumValue;
}

/**
 * @param array $array
 * @return float
 * @throws Exception
 */
function avgValue(array $array): float {
    $count = count($array);

    if ($count === 0) {
        throw new Exception("Array cannot be empty");
    }

    $avgValue = 0;

    foreach ($array as $value) {
        $avgValue += $value;
    }
    return $avgValue / $count;
}

function secondMax(array $array): int {
    if (count($array) < 2) {
        throw new Exception("Array must have at least two values");
    }

    $maxValue = max($array[0], $array[1]);
    $secondMaxValue = min($array[0], $array[1]);

    for ($i = 2; $i < count($array); $i++) {
        $value = $array[$i];

        if ($value > $maxValue) {
            $secondMaxValue = $maxValue;
            $maxValue = $value;
        } elseif ($value > $secondMaxValue) {
            $secondMaxValue = $value;
        }
    }

    return $secondMaxValue;
}

//$array = [5, 2, 9, 1, 7];
$array = [-5, -2, -9, -1];
//$array = [10, 8];
//$array = [1, 2, 3, 4, 5];
//$array = [5, 2, 9, 1, 7];

printf("Max value: %s\r\n", maxValue($array));
printf("Min value: %s\r\n", minValue($array));
printf("Sum value: %s\r\n", secondMax($array));
printf("Average value: %.2f\r\n", avgValue($array));
printf("Secondly value: %s\r\n", secondMax($array));