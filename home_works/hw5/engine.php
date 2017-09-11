<?php
namespace hw5;

class Engine
{
    public function start_engine() // Завести двигатель
    {
        echo "Завожу двигатель." . '<br>';
    }

    public function stop_engine() // Остановить двигатель
    {
        echo "Останавливаю двигатель." . '<br>';
    }

    public function enable_cooling() // Включить охлаждение
    {
        echo "Включено охлаждение." . '<br>';
    }

    public function disable_cooling() // ВЫключить охлаждение
    {
        echo "Выключаю охлаждение." . '<br>';
    }
}