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
    }

    // id последней записи
    $id_users = mysqli_insert_id($connection);

    // Если записи небыло в 56 строке значит взять id из $res
    (!$id_users) ? $id_users = $res['id'] : '';

    // Запись в заказы
    rec_order($connection, $name, $phone, $email, $street, $home, $housing, $appt, $floor, $comment, $payment, $payment_cart, $callback, $id_users);

    // id последней записи
    $id_order = mysqli_insert_id($connection);

    // Подсчёт количества заказов
    $quantity_arr = qty_orders($id_users, $connection);

    // Отправка почты
    go_mail($validEmail, $quantity_arr, $id_order, $street, $home, $housing, $appt);

} else {
    die;
}

/* Очищающая функция
============================================================*/
function clean($value = '')
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
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
    echo "<pre>";
    print_r($users_id);
    echo "</pre>";
    $quantity_string = "SELECT * FROM orders WHERE users_id = '$users_id'";
    $quantity_string = mysqli_query($connection, $quantity_string) or die('Ошибка запроса записи в случае подсчёта строк: ' . mysqli_error($connection));
    $quantity_arr = mysqli_fetch_all($quantity_string);
    echo "<pre>";
    print_r($quantity_arr);
    echo "</pre>";
    return count($quantity_arr);
}

/* Запись в заказы
============================================================*/
function rec_order($connection, $name, $phone, $email, $street, $home, $housing, $appt, $floor, $comment, $payment, $payment_cart, $callback, $id_users)
{
    $insert = "INSERT INTO orders (name, phone, email, street, home, housing, appt, floor, comment, payment, payment_cart, callback, users_id) VALUES ('$name', '$phone', '$email', '$street', '$home', '$housing', '$appt', '$floor', '$comment', '$payment', '$payment_cart', '$callback', '$id_users')";
    mysqli_query($connection, $insert) or die('Ошибка запроса записи в заказы: ' . mysqli_error($connection));
}
