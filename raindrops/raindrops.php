<?php


function raindrops($drop)
{
    $result = '';

    if ($drop % 3 === 0) {
        $result .= 'Pling';
    }
    if ($drop % 5 === 0) {
        $result .= 'Plang';
    }
    if ($drop % 7 === 0) {
        $result .= 'Plong';
    }

    if ($result === '') {
        $result = (string)$drop;
    }

    return $result;

}