<?php
require_once('db.php');
require_once('clean.php');
if (!$_SESSION['auth']) {

    if ($_COOKIE['token']) {
        $str = explode('_', $_COOKIE['token']);
    } elseif ($_SESSION['token']) {
        $str = explode('_', $_SESSION['token']);
    }

    /* Поиск логина на совпадение
    =========================================================*/
    $login = clean($str[0]);
    $password_user = clean($str[1]);

// Поиск в БД на совпадение Логина
    $search_users = "SELECT password FROM users WHERE login = '$login'";
    $res_users = mysqli_query($db, $search_users) or die('Ошибка поиска записи: ' . mysqli_error($db));
    $res = mysqli_fetch_assoc($res_users);

    if (md5($res['password']) === $password_user) {
        $_SESSION['auth'] = 1;
    } else {
        $_SESSION['auth'] = 0;
        // если нет такого пользователя тогда редирект на авторизацию
        header('Refresh:3; url=index.php');
    }
}
