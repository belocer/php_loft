<?php
namespace hw5;

class Transfer extends Engine
{
    public function enable_transfer() // Включить передачу
    {
        echo "Включаю передачу." . '<br>';
    }

    public function disable_transfer() // ВЫключить передачу
    {
        echo "Выключаю передачу." . '<br>';
    }
}