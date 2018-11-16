<?php


function encode($string)
{

    $alpha = range('a', 'z');
    $alphaReversed = range('z', 'a');

    $stringArray = str_split(strtolower($string));

    $encodedStr = '';
    $groupCounter = 0;

    foreach($stringArray as $index => $char)
    {
        $encodedChar = '';

        if (is_numeric($char))
        {
            $encodedChar = $char;
        }

        if (in_array($char, $alpha))
        {
            $key = array_search($char, $alpha);
            $encodedChar = $alphaReversed[$key];
        }

        if ($encodedChar !== '')
        {
            $encodedStr .= $encodedChar;
            $groupCounter++;

            if ($groupCounter % 5 === 0)
            {
                $encodedStr .= ' ';
                $groupCounter = 0;
            }
        }
    }

    return trim($encodedStr);
}

