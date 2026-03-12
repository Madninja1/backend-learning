<?php
declare(strict_types=1);

function arrayLength(array $array): int
{
    $count = 0;

    foreach ($array as $element) {
        $count++;
    }

    return $count;
}

function arrayContains(array $array, int $target): bool
{
    foreach ($array as $element) {
        if ($element === $target) {
            return true;
        }
    }

    return false;

    //    return in_array($target, $array);
}

function countOccurrences(array $array, int $target): int
{
    $count = 0;

    foreach ($array as $element) {
        if ($element === $target) {
            $count++;
        }
    }

    return $count;
}

function reverseArray(array $array): array
{
    $arr = [];

    $length = count($array);

    for ($i = $length - 1; $i >= 0; $i--) {
        $arr[] = $array[$i];
    }

    return $arr;
}

function secondMax(array $array): int
{
    if (count($array) < 2) {
        throw new Exception("Array must have at least 2 elements");
    }

    $max = null;
    $second = null;

    foreach ($array as $value) {
        if ($max === null || $value > $max) {
            $second = $max;
            $max = $value;
        } elseif ($value !== $max && ($second === null || $value > $second)) {
            $second = $value;
        }
    }

    if ($second === null) {
        throw new Exception("Second unique maximum does not exist");
    }

    return $second;
}


$containsArr = [5, 1, 9, 3];
printf("Count elements: %d\r\n", arrayLength($containsArr));
printf("Contains count: %s\r\n", arrayContains($containsArr, 9) ? 'true' : 'false');

$countOccurrencesArr = [1, 2, 3, 2, 2, 5];
printf("Occurrences count: %d\r\n", countOccurrences($countOccurrencesArr, 2));

$reverseArr = [1, 2, 3, 4];
printf("Reverse array: %s\r\n", json_encode(reverseArray($reverseArr)));

$secondMaxArr = [5, 8, 2, 10, 6];
printf("Second max: %d\r\n", secondMax($secondMaxArr));
