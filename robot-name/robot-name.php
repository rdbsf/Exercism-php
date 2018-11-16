<?php

class Robot {

    private $name;
    private $rf;

    public function __construct()
    {
        $this->rf = RobotNameFactory::getInstance();
        $this->name = $this->rf->create();
    }
    public function getName()
    {
        return $this->name;
    }
    public function reset()
    {
        $this->name = $this->rf->create();
    }
    
}


class RobotNameFactory {

    private $names = array();
    private static $inst = null;

    const MIN_ALPHA = 'A';
    const MAX_ALPHA = 'Z';
    
    const MIN_NUM = 0;
    const MAX_NUM = 9;
    
    public function __construct(){}
    public function __clone(){}

    public function getInstance()
    {
        if (self::$inst === null) {
            self::$inst = new self();
        }
        return self::$inst;
    }

    private function generateName()
    {
        $alpha = range(self::MIN_ALPHA, self::MAX_ALPHA);
        $numbers = range(self::MIN_NUM, self::MAX_NUM);

        $found = false;
        while(!$found)
        {
            $prefix = $alpha[array_rand($alpha)] . $alpha[array_rand($alpha)];
            $suffix = array_rand($numbers) . array_rand($numbers) . array_rand($numbers);
            $name =  $prefix . $suffix;

            if (!in_array($name, $this->names))
            {
                $found = true;
            }
        }

        $this->names[$name] = $name;
        return $name;
    }

    public function create()
    {
        return $this->generateName();
    }
}

