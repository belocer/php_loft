<?php

namespace hw5;
require 'engine.php';
require 'transfer.php';

class Car extends Transfer
{
    public $car_name;
    public $distance;
    public $speed;
    public $direction;

    function __construct($car_name, $dis, $spe, $dir)
    {
        $this->car_name = $car_name;
        $this->distance = $dis;
        $this->speed = $spe;
        $this->direction = $dir;
    }

    public function move()
    {
        echo 'Автомобиль: ' . $this->car_name . '<br>';
        echo 'Дистанция: ' . $this->distance . 'км' . '<br>';
        echo 'Скорость: ' . $this->speed . 'км/ч' . '<br>';
        echo 'Направление: ' . $this->direction . '<br>';
        parent::start_engine();
        parent::enable_transfer();

        if ($this->speed > 160) {
            parent::enable_cooling();
        }

        echo "Еду!";
    }
}