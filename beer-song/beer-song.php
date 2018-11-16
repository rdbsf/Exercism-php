<?php


interface IBeerSong {
    public function verse($n);
    public function verses($x, $y);
    public function lyrics();
}


class BeerSong implements IBeerSong {


    public function verse($n) {
        return $this->getVerse($n);
    }

    public function verses($x, $y) {
        // assume $x > $y

        $verses = [];
        for($n = $x; $n>=$y; $n--)
        {
            $verses[] = $this->getVerse($n);
        }

        return implode("\n", $verses);
    }

    public function lyrics(){
        return $this->verses(99, 0);
    }

    private function getBottleText($n) {

        $numberText = $n;

        if ($n === 0)
        {
            $numberText = 'No more';
        }
        else if ($n < 0)
        {
            $numberText = '99';
        }

        $plural = $n === 1 ? '' : 's';

        return sprintf("%s bottle%s", $numberText, $plural);
    }


    private function getVerse($n) {

        // assume $n < 100

        $bottleText = $this->getBottleText($n);

        $bottleNext = $this->getBottleText($n - 1);

        $line2Intro = 'Take ' . ($n === 1 ? 'it' : 'one') .' down and pass it around';
        if ($n < 1)
        {
            $line2Intro = 'Go to the store and buy some more';
        }

        $verse = sprintf("%s of beer on the wall, %s of beer.\n".
                        "%s, %s of beer on the wall.\n",
            $bottleText, lcfirst($bottleText), $line2Intro, lcfirst($bottleNext));

        if ($n === 0)
        {
            $verse = substr($verse, 0, -1); // remove line break
        }

        return $verse;
    }


}
