<?php

namespace hw5;

class Engine
{
    public $speed;
    public $power;
    public $temperature;

    function __construct($spe, $pow, $temper)
    {
        $this->speed = $spe;
        $this->power = $pow;
        $this->temperature = $temper;
    }

    public function start_engine($speed, $power, $temperature) // Завести двигатель
    {
        echo 'Завожу двигатель.' . '<br>';

        if ($this->speed > 160) {
            $this->enable_cooling();
        }

        echo 'Скорость: ' . $speed . "<br>";
        echo 'Мощность: ' . $power . "<br>";
        echo 'Температура: ' . $temperature . "<br>";
    }

    public function stop_engine() // Остановить двигатель
    {
        echo 'Останавливаю двигатель.' . '<br>';
    }

    private function enable_cooling() // Включить охлаждение
    {
        echo 'Включено охлаждение.' . '<br>';
    }
}