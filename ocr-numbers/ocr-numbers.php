<?php

function recognize($input)
{
    $width = strlen($input[0]);
    $height = sizeof($input);

    if ($height % 4 !== 0)
    {
        throw new InvalidArgumentException;
    }

    if ($width % 3 !== 0)
    {
        throw new InvalidArgumentException;
    }


    $answers = array();

    $answers[1] = array(
        1 => array(2 => '|'), 2 => array(2 => '|'),
    );
    $answers[2] = array(
        0 => array(1 => '_'), 1 => array(1 => '_', 2 => '|'), 2 => array(0 => '|',1 => '_'),
    );
    $answers[3] = array(
        0 => array(1 => '_'), 1 => array(1 => '_', 2 => '|'), 2 => array(1 => '_', 2 => '|'),
    );
    $answers[4] = array(
        1 => array(0 => '|',1 => '_', 2 => '|'), 2 => array(2 => '|'),
    );
    $answers[5] = array(
        0 => array(1 => '_'), 1 => array(0 => '|',1 => '_'), 2 => array(1 => '_',2 => '|'),
    );
    $answers[6] = array(
        0 => array(1 => '_'), 1 => array(0 => '|', 1 => '_', ), 2 => array(0 => '|', 1 => '_',2 => '|'),
    );
    $answers[7] = array(
        0 => array(1 => '_'), 1 => array(2 => '|'), 2 => array(2 => '|'),
    );
    $answers[8] = array(
        0 => array(1 => '_'), 1 => array(0 => '|', 1 => '_', 2 => '|'), 2 => array(0 => '|', 1 => '_', 2 => '|'),
    );
    $answers[9] = array(
        0 => array(1 => '_'), 1 => array(0 => '|', 1 => '_', 2 => '|' ), 2 => array(1 => '_', 2 => '|'),
    );
    $answers[0] = array(
        0 => array(1 => '_'), 1 => array(0 => '|', 2 => '|', ), 2 => array(0 => '|', 1 => '_', 2 => '|'),
    );

    $numsPerRow = $width / 3;

    $numMatrix = array();

    for($y=0; $y < $height; $y++)
    {
        $numCounter = 1 + (floor($y / 4) * $numsPerRow);
        $rowY = $y % 4;
        for($x=0; $x < $width; $x+=3)
        {
            $row = substr($input[$y], $x, 3);
            foreach(str_split($row) as $i => $char)
            {
                if ($char !== ' ')
                {
                    $numMatrix[$numCounter][$rowY][$i] = $char;
                }
            }
            $numCounter++;
        }
    }

    $result = '';
    ksort($numMatrix);

    $cnt = 0;
    foreach($numMatrix as $matrix)
    {
        $found = false;
        foreach($answers as $num => $answer)
        {
            if ($matrix === $answer)
            {
                $found = true;
                $result .= $num;
            }
        }

        if (!$found)
        {
            $result .= '?';
        }

        $cnt++;

        if ($cnt % $numsPerRow === 0 && sizeof($numMatrix) > $cnt)
        {
            $result .= ',';
        }

    }


    return $result;
}
