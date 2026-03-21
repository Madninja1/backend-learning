<?php
declare(strict_types=1);

//индекс максимального элемента
function indexOfMax(array $arr): int
{
    $maxIndex = 0;
    $maxValue = $arr[0];
    $count = count($arr);

    for ($i = 1; $i < $count; $i++) {
        if ($arr[$i] > $maxValue) {
            $maxValue = $arr[$i];
            $maxIndex = $i;
        }
    }

    return $maxIndex;
}

//индекс минимального элемента
function indexOfMin(array $arr): int
{
   $minValue = $arr[0];
   $minIndex = 0;

   foreach ($arr as $key => $value) {
       if ($value < $minValue) {
           $minValue = $value;
           $minIndex = $key;
       }
   }

   return $minIndex;
}

//Сумма только чётный числе
function sumEven(array $arr): int
{
    $sum = 0;
    foreach ($arr as $value) {
        if ($value % 2 === 0) {
            $sum += $value;
        }
    }

    return $sum;
}

//Количество положительных чисел
function countPositive(array $arr): int
{
    $count = 0;

    foreach ($arr as $value) {
        if ($value > 0) {
            $count++;
        }
    }

    return $count;
}

//Разница между максимумом и минимумом
function diffMaxMin(array $arr): int
{
    $count = count($arr);

    $max = $arr[0];
    $min = $max;

    for($i = 1; $i < $count; $i++) {
        if ($arr[$i] > $max) {
            $max = $arr[$i];
        }
        if ($arr[$i] < $min) {
            $min = $arr[$i];
        }
    }

    return $max - $min;
}

$indexOfMaxArray = [
    5,
    2,
    9,
    1,
    7,
]; // 2

$indexOfMinArray = [
    5,
    2,
    9,
    1,
    7,
]; // 3

$sumEvenArray = [
    1,
    2,
    3,
    4,
    5,
    6,
]; // 12

$countPositiveArray = [
    -3,
    0,
    5,
    7,
    -1
]; // 2

$diffMaxMinArray = [
    5,
    2,
    9,
    1,
    7,
]; // 8

printf("Index of max: %d\r\n", indexOfMax($indexOfMaxArray));
printf("Index of min: %d\r\n", indexOfMin($indexOfMinArray));
printf("Sum even: %d\r\n", sumEven($sumEvenArray));
printf("Count positive: %d\r\n", countPositive($countPositiveArray));
printf("Diff max min: %d\r\n", diffMaxMin($diffMaxMinArray));