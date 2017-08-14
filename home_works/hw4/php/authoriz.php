<?php
/* Поиск логина на совпадение
=========================================================*/
$login = clean($_POST['login']);
$password_user = clean($_POST['password']);

// Подключаюсь к БД
$connection = mysqli_connect('localhost', 'root', '', 'beloc_hw4', 3306);

if (!$connection) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки error: " . mysqli_connect_error() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// Установка кодировки
mysqli_query($connection, 'SET NAMES "UTF-8"');

// Поиск в БД на совпадение Логина
$search_users = "SELECT password FROM users WHERE login = '$login'";
$res_users = mysqli_query($connection, $search_users) or die('Ошибка поиска записи: ' . mysqli_error($connection));
$res = mysqli_fetch_assoc($res_users);

$password_user = crypt($password_user, 'hw4');

if ($res['password'] === $password_user) {

    // Устанавливаю cookie
    // Проверяю установились ли cookie
    if (setcookie("login", $login, time() + 3600, '/', 'http://php7/', null, false)) {
        echo "<h5 style='color:grey; display:block; margin:0 auto; width:500px;height:50px;text-align: center;'>Авторизация действительна в течении часа</h5>";
        echo "<pre style='overflow: visible;'>";
        print_r($_COOKIE);
        echo "</pre>";
    } else {
        // Запоминаю в сессию
        $_SESSION['login'] = $login;
        echo "<pre style='overflow: visible;'>";
        print_r($_SESSION);
        echo "</pre>";
    }

    echo "<h1 style='color:green; display:block; margin:0 auto; width:500px;height:50px;text-align: center;'>Вы авторизованы!</h1>";

} else if (($res['password'] !== $password_user)) {

    echo "<h1 style='color:darkred'>Не верны логин или пароль</h1>";

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