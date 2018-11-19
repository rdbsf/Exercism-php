<?php


function squareOfSum($number)
{
    $array = range(1, $number);
    $sum = array_reduce($array, function($carry, $item){ $carry += $item; return $carry; });
    return $sum * $sum;

}

function sumOfSquares($number)
{
    $array = range(1, $number);
    return array_reduce($array, function($carry, $item){ $carry += ($item * $item); return $carry; });
}

function difference($number)
{
    return abs(sumOfSquares($number) - squareOfSum($number));
}