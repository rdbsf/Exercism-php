<?php

class Series {

    private $digitsArray;

    public function __construct($digits)
    {
        $this->digitsArray = $digits === '' ? [] : str_split($digits);
    }

    public function largestProduct($numDigits)
    {
        $max = 0;

        $len = count($this->digitsArray);

        if ($numDigits > $len || $numDigits < 0 || $this->digitsArray !== array_filter($this->digitsArray, function($char) { return is_numeric($char);}))
        {
            throw new InvalidArgumentException;
        }

        if ($numDigits === $len && $numDigits === 0)
        {
            return 1;
        }

        if ($numDigits === $len)
        {
            return array_product($this->digitsArray);
        }

        for($x=0; $x<=$len-$numDigits; $x++)
        {
            $product = array_product(array_slice($this->digitsArray, $x, $numDigits));
            if ($product > $max)
            {
                $max = $product;
            }
        }

        return $max;
    }
}
