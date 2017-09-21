<?php

namespace hw5;

require_once 'Engine.php';

class Transmission extends Engine
{
    protected function enable_transmission() // Включить передачу
    {
        echo 'Включаю передачу,- вперёд.' . '<br>';
    }

    protected function disable_transmission() // ВЫключить передачу
    {
        echo 'Выключаю передачу.' . '<br>';
    }
}