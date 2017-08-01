<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<a href='../index.html'>Вернуться</a>";
echo "<hr>";

/* Очистка данных от пользователя
 ============================================================*/
$warning = [];
$name = clean($_POST['name']);
$phone = clean($_POST['phone']);
$email = clean($_POST['email']);
$street = clean($_POST['street']);
$home = clean($_POST['home']);
$housing = clean($_POST['part']);
$appt = clean($_POST['appt']);
$floor = clean($_POST['floor']);
$comment = clean($_POST['comment']);
$payment = clean($_POST['payment']);
$payment_cart = clean($_POST['payment_cart']);
$callback = clean($_POST['callback']);

function clean($value = '') // Очищающая функция
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

/*(mb_strlen($name) < 1) ? array_push($warning, '<li>* Введите пожалуйста Имя получателя</li>') : '';
(!$phone) ? array_push($warning, '<li>* Введите пожалуйста номер телефона получателя</li>') : '';
(!$email) ? array_push($warning, '<li>* Введите пожалуйста email получателя</li>') : '';
(!$street) ? array_push($warning, '<li>* Укажите пожалуйста улицу доставки</li>') : '';
echo $home;
$warning[] = (!$home) ? '<li>* Укажите пожалуйста номер дома</li>' : '';

echo "<pre>";
print_r($warning);
echo "</pre>";*/

/* Запись в БД
 ============================================================*/
// Подключаюсь к БД
$connection = mysqli_connect('localhost', 'root', '', 'burgers', 3306);

if (!$connection) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки error: " . mysqli_connect_error() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// Установка кодировки
mysqli_query($connection, 'SET NAMES "UTF-8"');

// Запись
$insert = "INSERT INTO orders (name, phone, email, street, home, housing, appt, floor, comment, payment, payment_cart, callback) VALUES ('$name', '$phone', '$email', '$street', '$home', '$housing', '$appt', '$floor', '$comment', '$payment', '$payment_cart', '$callback')";
mysqli_query($connection, $insert) or die('Ошибка запроса записи: ' . mysqli_error($connection));
