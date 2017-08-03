<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Админ</title>
</head>
<body>
<div class="container">
    <nav class="menu">
        <ul>
            <li><a class="menu_color users" href="#"  id="active">пользователи</a>
            <li><a class="menu_color orders" href="#">заказы</a>
            <li><a class="menu_color search_users" href="#">поиск пользователей</a>
            <li><a class="menu_color search_orders" href="#">поиск заказов</a>
        </ul>
    </nav>
    <div class="wrap content">

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
        $res = mysqli_fetch_all($res_users);
        ?>

        <h2>Пользователи</h2>
        <div><span>id</span><span>Имя</span><span>email</span><span>телефон</span></div>

        <?php
        for ($i = 0; $i < count($res); $i++) {
            echo "<ul>";
            echo "<li>" . $res[$i][0] . "</li>";
            echo "<li>" . $res[$i][1] . "</li>";
            echo "<li>" . $res[$i][2] . "</li>";
            echo "<li>" . $res[$i][3] . "</li>";
            echo "</ul>";
        }
        ?>

    </div>

    <div class="wrap content1 close">

        <?php
        // Поиск заказов
        $search_orders = "SELECT * FROM orders";
        $res_orders = mysqli_query($connection, $search_orders) or die('Ошибка поиска записи: ' . mysqli_error($connection));
        $res = mysqli_fetch_all($res_orders);
        ?>

        <h2>Заказы</h2>

        <?php // Вывожу заказы из таблицы orders
        for ($i = 0; $i < count($res); $i++) {
            echo "<hr><div class='block'>";
            echo "<div class='id_user'><span>id: " . $res[$i][0] . "</span></div>";
            echo "<div class='column1'><div><span>Имя: </span>" . $res[$i][1] . "</div>";
            echo "<div><span>email: </span>" . $res[$i][2] . "</div>";
            echo "<div><span>Телефон: </span>" . $res[$i][3] . "</div>";
            echo "<div><span>Улица: </span>" . $res[$i][4] . "</div>";
            echo "<div><span>Дом: </span>" . $res[$i][5] . "</div>";
            echo "<div><span>Корпус: </span>" . $res[$i][6] . "</div></div>";
            echo "<div class='column2'><div><span>Квартира</span>" . $res[$i][7] . "</div>";
            echo "<div><span>Этаж: </span>" . $res[$i][8] . "</div>";
            echo "<div><span>Дата: </span>" . $res[$i][9] . "</div>";
            echo "<div><span>Сдача: </span>" . $res[$i][10] . "</div>";
            echo "<div><span>Карта: </span>" . $res[$i][11] . "</div>";
            echo "<div class='callback'><span>Не&nbsp;перезванивать: &nbsp;" . $res[$i][12] . "</span></div></div>";
            echo "<div class='comment'><span>Комментарий: </span>" . $res[$i][13] . "</div>";
            echo "</div>";
        }
        ?>

    </div>
</div>
<div class="wrap content2"><h2>Для будущих свершений)</h2></div>
<div class="wrap content3"><h2>Для будущих свершений)</h2></div>
<script src="../js/js.js"></script>
</body>
</html>

