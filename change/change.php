<?php

function findFewestCoins($coins, $amount)
{
    if (empty($coins) || $amount === 0)
    {
        return array();
    }

    if ($amount < 0)
    {
        throw new InvalidArgumentException('Cannot make change for negative value');
    }

    rsort($coins);

    $result = array();

    foreach($coins as $coin)
    {
        while($amount >= $coin)
        {
            $result[] = $coin;
            $amount = $amount - $coin;
        }
    }

    if ($amount > 0)
    {
        throw new InvalidArgumentException('No combination can add up to target');
    }

    if (empty($result))
    {
        throw new InvalidArgumentException('No coins small enough to make change');
    }

    sort($result);
    return $result;
}
