<?php


function encode($input)
{
    if ($input === '')
    {
        return '';
    }

    $length = strlen($input);

    $encoded = '';
    $seqChar = $input[0];
    $cnt = 1;

    for($x=1; $x < $length; $x++)
    {
        $char = $input[$x];

        if ($char == $seqChar)
        {
            $cnt++;
        }

        if ($char !== $seqChar)
        {
            $encoded .= ($cnt > 1 ? $cnt : '') . $seqChar;
            $cnt = 1;
            $seqChar = $char;
        }

        if ($x+1 === $length)
        {
            $encoded .= ($cnt > 1 ? $cnt : '') . $char;
        }

    }

    return $encoded;
}

function decode($input)
{

    if ($input === '')
    {
        return '';
    }

    $decoded = '';
    $count = 1;
    $size = strlen($input);

    for($x=0; $x < $size; $x++)
    {
        $char = $input[$x];
        if (is_numeric($char))
        {
            if ($count !== 1)
            {
                $count .= $char;
            }
            else {
                $count = $char;
            }
        }
        else {
            $decoded .= str_pad('', (int)$count, $char);
            $count = 1;
        }
    }

    return $decoded;

}
