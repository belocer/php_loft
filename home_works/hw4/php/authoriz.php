<?php
require_once('db.php');
require_once('clean.php');
/* Поиск логина на совпадение
=========================================================*/
$login = clean($_POST['login']);
$password_user = clean($_POST['password']);


// Поиск в БД на совпадение Логина
$search_users = "SELECT password FROM users WHERE login = '$login'";
$res_users = mysqli_query($db, $search_users) or die('Ошибка поиска записи: ' . mysqli_error($db));
$res = mysqli_fetch_assoc($res_users);

$password_user = crypt($password_user, 'hw4');

if ($res['password'] === $password_user) {

    // готовлю токен
    $token = $login . '_' . md5($password_user);

    // Устанавливаю cookie
    // Проверяю установились ли cookie
    if (setcookie("token", $token, time() + 600, '/')) {
        echo "<h5 style='color:grey; display:block; margin:0 auto; width:500px;height:50px;text-align: center;'>Авторизация действительна в течении 10 минут</h5>";
        $_SESSION['auth'] = 1;
    } else {
        // Запоминаю в сессию
        $_SESSION['token'] = $token;
        $_SESSION['auth'] = 1;
    }

    echo "<h1 style='color:green; display:block; margin:0 auto; width:500px;height:50px;text-align: center;'>Вы авторизованы!</h1>";

} else if (($res['password'] !== $password_user)) {

    echo "<h1 style='color:darkred; display:block; margin:0 auto; width:500px;height:50px;text-align: center;'>Не верны логин или пароль</h1><br><br><a style='display:block; margin:0 auto;' href='index.php'>Попробовать ещё раз</a>";

}
