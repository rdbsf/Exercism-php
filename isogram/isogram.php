<?php


function isIsogram($string)
{

    $string = str_replace(array('-', ' '), '', $string);

    $string = mb_strtoupper($string);
    $string = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);

    if (max(array_count_values($string)) > 1)
    {
        return false;
    }

    return true;

}