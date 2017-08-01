<?php
// Подключаюсь к БД
$connection = mysqli_connect('localhost', 'root', '', 'burgers', 3306);

// Ошибки
if (!$connection) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки error: " . mysqli_connect_error() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// Установка кодировки
mysqli_query($connection, 'SET NAMES "UTF-8"');

// Поиск по email уже существующего пользователя
$search_users = "SELECT * FROM users";
$res_users = mysqli_query($connection, $search_users) or die('Ошибка поиска записи: ' . mysqli_error($connection));
$res = mysqli_fetch_assoc($res_users);