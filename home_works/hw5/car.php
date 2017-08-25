<?php

namespace hw5;
require 'engine.php';
require 'transfer.php';

class Car
{
    public $distance;
    public $speed;
    public $direction;

    function __construct($dis, $spe, $dir)
    {
        $this->distance = $dis;
        $this->speed = $spe;
        $this->direction = $dir;
    }

    public function move()
    {

    }
}

$niva = new Car(200, 90, "Moscow");
echo "<pre>";
print_r($niva);
echo "</pre>";
