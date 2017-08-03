<?php
echo "<h1 style='text-align: center;'>Спасибо за заказ, мы скоро с Вами свяжемся!</h1><br>";
echo "<a href='../index.html' style='text-align: center;'>Вернуться на сайт</a>";
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

$validEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); // Валидация

if ($validEmail) {

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

// Поиск по email уже существующего пользователя
    $search_users = "SELECT id FROM users WHERE email = '$email'";
    $res_users = mysqli_query($connection, $search_users) or die('Ошибка поиска записи: ' . mysqli_error($connection));
    $res = mysqli_fetch_assoc($res_users);

    if (!$res) {
        // Запись в пользователи
        $insert = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
        mysqli_query($connection, $insert) or die('Ошибка запроса записи: ' . mysqli_error($connection));

        // Поиск по email уже существующего пользователя
        $search_users = "SELECT id FROM users WHERE email = '$email'";
        $res_users = mysqli_query($connection, $search_users) or die('Ошибка поиска записи: ' . mysqli_error($connection));
        $res = mysqli_fetch_assoc($res_users);

        // Запись в заказы
        $users_id = $res['id'];
        $insert = "INSERT INTO orders (name, phone, email, street, home, housing, appt, floor, comment, payment, payment_cart, callback, users_id) VALUES ('$name', '$phone', '$email', '$street', '$home', '$housing', '$appt', '$floor', '$comment', '$payment', '$payment_cart', '$callback', '$users_id')";
        mysqli_query($connection, $insert) or die('Ошибка запроса записи в случае если нет такого польователя: ' . mysqli_error($connection));

        $id_order = mysqli_insert_id($connection); // id последней записи

        go_mail($validEmail, 1, $id_order, $street, $home, $housing, $appt); // Отправка почты

    } elseif ($res) {
        // Запись в заказы
        $users_id = $res['id'];
        $insert = "INSERT INTO orders (name, phone, email, street, home, housing, appt, floor, comment, payment, payment_cart, callback, users_id) VALUES ('$name', '$phone', '$email', '$street', '$home', '$housing', '$appt', '$floor', '$comment', '$payment', '$payment_cart', '$callback', '$users_id')";
        mysqli_query($connection, $insert) or die('Ошибка запроса записи в случае если есть такой пользователь: ' . mysqli_error($connection));

        $id_order = mysqli_insert_id($connection); // id последней записи

        $quantity_arr = qty_orders($users_id, $connection); // Подсчёт количества заказов

        go_mail($validEmail, $quantity_arr, $id_order, $street, $home, $housing, $appt); // Отправка почты
    }
} else {
    die;
}

/* Отправляю письмо
============================================================*/
function go_mail($validEmail, $quantity_arr, $id_order, $street, $home, $housing, $appt)
{
    mail($validEmail, 'Бургеры!', "<h1>Заказ " . $id_order . "</h1>" .
        "<h5>Ваш заказ будет доставлен по адресу: " . "Улица: $street <br> Дом: $home <br> Корпус: $housing <br> Квартира: $appt </h5><br>" . "Содержание заказа: DarkBeefBurger за 500 рублей 1 шт. <br>" . "Спасибо! Это уже " . $quantity_arr . " заказ");
}

/* Считаю количество заказов
============================================================*/
function qty_orders($users_id, $connection)
{
    $quantity_string = "SELECT * FROM orders WHERE users_id = '$users_id'";
    $quantity_string = mysqli_query($connection, $quantity_string) or die('Ошибка запроса записи в случае подсчёта строк: ' . mysqli_error($connection));
    $quantity_arr = mysqli_fetch_all($quantity_string);

    return count($quantity_arr);
}






