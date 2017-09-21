<?php

namespace hw5;

class Engine
{
    private $speed;
    private $power;
    private $temperature;
    private $distance;

    function __construct($spe, $pow, $temper, $distance)
    {
        $this->speed = $spe;
        $this->power = $pow;
        $this->temperature = $temper;
        $this->distance = $distance;
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

    public function stop_engine($distance, $speed, $temperature) // Остановить двигатель
    {
        echo 'Останавливаю двигатель.' . '<br>';

        echo 'Затрачено времени: ' . ($distance / $speed) . ' часов<br>';

        echo 'Количество включений охлаждения: ' . (int) ($temperature / 90) . '<br>';
        unset($_GET);
    }

    private function enable_cooling() // Включить охлаждение
    {
        echo 'Включено охлаждение.' . '<br>';
    }
}