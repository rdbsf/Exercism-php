<?php

const BOOK_PRICE = 8;

function total($basket)
{
    if (empty($basket))
    {
        return 0;
    }

    $groups = array_fill(1, 5, 0);

    // total number of each book
    foreach($basket as $book)
    {
        $groups[$book]++;
    }

    // set min to max
    $minTotal = array_sum($groups) * BOOK_PRICE;

    // check groupings of 5,4,3,2,1 for best min total
    for($x=5; $x>0; $x--)
    {
        $total = 0;
        $checkout = $groups;

        for($y=$x; $y>0; $y--)
        {
            while (maxDiffBooks($checkout) >= $y)
            {
                $savings = 0;

                // find savings
                if ($y === 5)
                {
                    $savings = 0.25;
                }
                if ($y === 4)
                {
                    $savings = 0.20;
                }
                if ($y === 3)
                {
                    $savings = 0.10;
                }
                if ($y === 2)
                {
                    $savings = 0.05;
                }

                // add price
                $booksPrice = BOOK_PRICE * $y;
                $total += $booksPrice - ($booksPrice * $savings);

                // remove books
                $checkout = removeOneFromEach($checkout, $y);
            }
        }

        $total += array_sum($checkout) * BOOK_PRICE;
        $minTotal = min($minTotal, $total);

    }

    return number_format($minTotal, 2);
}

// find most number of books in each group
function maxDiffBooks($books)
{
    $num = 0;
    foreach($books as $book)
    {
        if ($book > 0)
        {
            $num++;
        }
    }

    return $num;
}

// remove books from group that we already counted
function removeOneFromEach($books, $max)
{
    foreach($books as $index => $count)
    {
        if ($count > 0)
        {
            $books[$index]--;
            $max--;
            if ($max === 0)
            {
                break;
            }
        }
    }

    return $books;
}
