<?php

namespace hw5;

require_once 'Engine.php';

require_once 'Transmission.php';

class Car extends Transmission
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
        parent::start_engine($this->speed, $this->speed * 7.2, ($this->distance / 0.10 * 5), $this->distance);
        parent::enable_transmission();

        echo "Еду!" . '<br>';
    }
}