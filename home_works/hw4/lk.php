<?php

if (isset($_POST['save'])) {
    // Очищаю данные от пользователя
    // Проверяю заполненность полей, если косяк, - редирект обратно на reg.html
    $login = clean($_POST['login']);
    $password = clean($_POST['password']);
    $name = clean($_POST['name']);
    $age = clean($_POST['age']);
    $description = clean($_POST['description']);
    $photo_path = clean($_POST['photo_path']);

    /* Запись в БД
     ============================================================*/
// Подключаюсь к БД
    $connection = mysqli_connect('localhost', 'root', '', 'beloc_hw4', 3306);

    if (!$connection) {
        echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
        echo "Код ошибки error: " . mysqli_connect_error() . PHP_EOL;
        echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

// Поиск в БД на совпадение Логина
    $search_users = "SELECT login FROM users WHERE login = '$login'";
    $res_users = mysqli_query($connection, $search_users) or die('Ошибка поиска записи: ' . mysqli_error($connection));
    $res = mysqli_fetch_assoc($res_users);


    // Установка кодировки
    mysqli_query($connection, 'SET NAMES "UTF-8"');

    // Готовлю пароль для записи в БД
    $hashed_password = crypt($password, 'hw4'); // соль hw4

    // Пишу в БД
    $update = "UPDATE users SET login = '$login', password = '$hashed_password', name = '$name', age = '$age', description = '$description', photo = '$photo_path' WHERE login = '$login'";
    mysqli_query($connection, $update) or die('Ошибка запроса записи в БД логин и пароль : ' . mysqli_error($connection));
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Личный кабинет</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Авторизация</a></li>
                <li><a href="reg.php">Регистрация</a></li>
                <li><a href="list.php">Список пользователей</a></li>
                <li><a href="filelist.php">Список файлов</a></li>
                <li class="active"><a href="lk.php">Личный кабинет</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="form-container" style="margin-top:10%;">
    <form class="form-horizontal" action="lk.php" method="post">
        <div class="form-group">
            <label for="login" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="login" placeholder="Логин" name="login" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="Пароль" name="password" required>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Пароль" name="name" required>
            </div>
        </div>
        <div class="form-group">
            <label for="age" class="col-sm-2 control-label">Возраст</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="age" placeholder="Возраст" name="age" required>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Описание</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="description" placeholder="Описание" name="description"
                       required>
            </div>
        </div>
        <div class="form-group">
            <label for="photo_path" class="col-sm-2 control-label">фото</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="photo_path" placeholder="фото" name="photo_path" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" id="save" name="save">Сохранить</button>
                <br><br>
            </div>
        </div>
    </form>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/main.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>