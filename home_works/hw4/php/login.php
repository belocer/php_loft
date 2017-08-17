<?php
require_once('db.php');
require_once('clean.php');
/* Поиск логина на совпадение
=========================================================*/
$login = clean($_POST['login']);

// Поиск в БД на совпадение Логина
$search_users = "SELECT login FROM users WHERE login = '$login'";
$res_users = mysqli_query($db, $search_users) or die('Ошибка поиска записи: ' . mysqli_error($db));
$res = mysqli_fetch_assoc($res_users);

if (!$res) {
    echo "<span style='color:green'>Логин свободен</span>";
} elseif ($res) {
    echo "<span style='color:red'>Логин занят</span>";
}
