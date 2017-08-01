<?php
/* Очистка данных от пользователя
 ============================================================*/
$email = clean($_POST['email']);

function clean($value = '')
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

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
$search_mail = "SELECT email FROM orders WHERE email = '$email'";
$res_mail = mysqli_query($connection, $search_mail) or die('Ошибка поиска записи: ' . mysqli_error($connection));
$res_email = mysqli_fetch_assoc($res_mail);

if ($res_email == $email) {
    //echo 'Введёный email совпадает с email из БД'. '<br>';
    $search_data = "SELECT phone FROM orders WHERE email = '$email'";
    $res_data = mysqli_query($connection, $search_data) or die('Ошибка выборки записи: ' . mysqli_error($connection));
    $res = mysqli_fetch_all($res_data);
    echo "<pre>";
    var_dump($res);
    echo "</pre>";
    //$str = implode(';', $res);
    //echo $str;
}


