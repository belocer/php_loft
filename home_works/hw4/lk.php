<?php
require_once('php/db.php');
require_once('php/clean.php');
require_once('php/cookie.php');

// Выход
if (isset($_GET['out'])) {
    unset($_COOKIE);
    unset($_SESSION);
    unset($_POST);
    header('Location: index.php');
}

$warning = [];

// Перезаписыаю данные пользователя
if (isset($_POST['save'])) {
    // Очищаю данные от пользователя
    // Проверяю заполненность полей, если косяк, - редирект обратно на reg.html
    $login = clean($_POST['login']);
    $password = clean($_POST['password']);
    $name = clean($_POST['name']);
    $age = clean($_POST['age']);
    if (!is_numeric($age)) {
        array_push($warning, 'Это не число');
    }
    $description = clean($_POST['description']);
    $photo_path = clean($_POST['photo_path']);

    /*Загрузка фото
=========================*/
// каталог для загрузки файлов
    $dir = './photos/';

    if ($_FILES['photo_path']['name'] && $_FILES['photo_path']['type']) {

        $file_unic = uniqid();
        $upfile = $_FILES['photo_path']['tmp_name']; /*— РНР Сохраняет Принятые фа-ы во временном каталоге, в
	этом поле массива хранится имя временного файла;*/
        $upfile_name = str_replace(' ', '', $_FILES['photo_path']['name']); //- имя файла на компьютере пользователя;
        $upfile_name = preg_replace('|[А-Яа-я]*|u', '', $upfile_name); //- имя файла на компьютере пользователя;
        $error_code = $_FILES['photo_path']['error']; //— КОД Ошибки

        // Проверка расширения файла
        $file = empty($_FILES['photo_path']) ? null : $_FILES['photo_path'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $img_exts = ['jpeg', 'jpg', 'png', 'gif'];

        if (!in_array($ext, $img_exts)) {
            array_push($warning, 'Это не изображение');
        }
        if ($file['size'] == 0) {
            array_push($warning, 'Пустой файл');
        }
        if ($file['size'] > 3000000) {
            array_push($warning, 'Пожалуйста,- выберите файл меньше 3 мегабайт.');
        }

        // Если ошибок нет
        if ($error_code == 0 && count($warning) < 1) {
            //Путь сохранения файла
            $path_file = $dir . $file_unic . $upfile_name;
            copy($upfile, $path_file);
        } else {
            $path_file = '';
        }

        unset($_FILES);
    }

    /* Запись в БД
     ============================================================*/
    // Пишу в БД
    if (count($warning) < 1) {

        // Поиск в БД на совпадение Логина
        $search_users = "SELECT login FROM users WHERE login = '$login'";
        $res_users = mysqli_query($db, $search_users) or die('Ошибка поиска записи: ' . mysqli_error($db));
        $res = mysqli_fetch_assoc($res_users);

        // Готовлю пароль для записи в БД
        $hashed_password = crypt($password, 'hw4'); // соль hw4

        $update = "UPDATE users SET login = '$login', password = '$hashed_password', name = '$name', age = '$age', description = '$description', photo = '$path_file' WHERE login = '$login'";
        mysqli_query($db, $update) or die('Ошибка запроса обновления данных в БД : ' . mysqli_error($db));
    }
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
                <?php if ($_SESSION['auth'] === 1) {
                    echo '<li><a href="list.php">Список пользователей</a></li>';
                } ?>
                <?php if ($_SESSION['auth'] === 1) {
                    echo '<li><a href="filelist.php">Список файлов</a></li>';
                } ?>
                <?php if ($_SESSION['auth'] === 1) {
                    echo '<li class="active"><a href="lk.php">Личный кабинет</a></li>';
                } ?>
                <?php if ($_SESSION['auth'] === 1) {
                    echo '<li><a href="lk.php?out=out">Выход</a></li>';
                } ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<?php
// Поиск в БД на совпадение Логина
$search = "SELECT login, name, age, description, photo FROM users WHERE login = '$login'";
$users = mysqli_query($db, $search) or die('Ошибка поиска записи: ' . mysqli_error($db));
$res_search = mysqli_fetch_all($users);
?>
<div class="form-container" style="margin-top:10%;">
    <form class="form-horizontal" action="lk.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="login" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="login" placeholder="Логин" name="login"
                       value="<?php echo $res_search[0][0]; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="Имя" name="name"
                       value="<?php echo $res_search[0][1]; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="age" class="col-sm-2 control-label">Возраст</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="age" placeholder="Возраст" name="age"
                       value="<?php echo $res_search[0][2]; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="col-sm-2 control-label">Описание</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="description" placeholder="Описание" name="description"
                       value="<?php echo $res_search[0][3]; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <?php if ($res_search[0][4]) {
                echo "<img src='" . $res_search[0][4] . "' alt='img' style='width:100px;'>";
            } else {
                echo "Фото НЕТ!";
            } ?>
            <label for="photo_path" class="col-sm-2 control-label">фото</label>
            <div class="col-sm-10">
                <input type="file" id="photo_path" name="photo_path" accept="image/jpeg,image/png,image/gif">
            </div>
        </div>
        <div id="warning"><?php
            if (count($warning) > 0) {
                foreach ($warning as $key => $value) {
                    echo '* ' . $value . '<br>';
                }
            }
            ?></div>
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
<script src="js/save_lk.js"></script>
</body>
</html>