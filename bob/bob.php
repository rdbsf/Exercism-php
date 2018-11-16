<?php

class Bob {

    public function respondTo($sentence)
    {
        $sentence = trim($sentence);

        if ($sentence === '')
        {
            return 'Fine. Be that way!';
        }

        if ($this->isYelling($sentence))
        {
            if ($this->isQuestion($sentence))
            {
                return 'Calm down, I know what I\'m doing!';
            }

            return 'Whoa, chill out!';
        }
        else if ($this->isQuestion($sentence))
        {
            return 'Sure.';
        }
        else {
            return 'Whatever.';
        }
    }

    private function isYelling($sentence)
    {
        return preg_match('/[A-Z]/', $sentence) && strtoupper($sentence) === $sentence;
    }

    private function isQuestion($sentence)
    {
        return substr($sentence,-1) === '?';
    }
}
