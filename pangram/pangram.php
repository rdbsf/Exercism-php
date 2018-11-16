<?php


function isPangram($string)
{
    if (strlen($string) < 26)
    {
        return false;
    }

    $string = preg_replace('/[^a-z]/', '', strtolower($string));

    $cleaned = array_unique(str_split($string));

    $diff = array_diff(range('a','z'), $cleaned);

    if (sizeof($diff) > 0)
    {
        return false;
    }

    return true;
}
