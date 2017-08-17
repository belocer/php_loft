<?php
// Подключаюсь к БД
$db = mysqli_connect('localhost', 'root', '', 'beloc_hw4', 3306);

if (!$db) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки error: " . mysqli_connect_error() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
// Установка кодировки
mysqli_query($db, 'SET NAMES "UTF-8"');
