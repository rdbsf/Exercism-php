<?php


function isIsogram($string)
{

    $string = str_replace(array('-', ' '), '', $string);

    $string = preg_split('//u', mb_strtoupper($string), -1, PREG_SPLIT_NO_EMPTY);

    return max(array_count_values($string)) === 1;

}