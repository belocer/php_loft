<?php
namespace hw5;

require 'car.php';
if ($_GET['name'] === '' || $_GET['distance']  === '' || $_GET['speed'] === '' || $_GET['direction'] === '') {
    $_SESSION['error'] = '<h1 style="color:darkred;">Проверьте заполненность полей!</h1>';
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<?php
if ($_SESSION['error'] && $_GET['button'] === 'Поехали') {
    echo $_SESSION['error'];
}
?>
<form action="#" method="get" class="container">
    <h2>Указать параметры авто:</h2>
    <p>Название авто:</p>
    <input type="text" name="name"><br><br>
    <p>Расстояние:</p>
    <input type="text" name="distance">&nbsp;&nbsp;<span>км</span><br><br>
    <p>Скорость:</p>
    <input type="text" name="speed">&nbsp;&nbsp;<span>км/ч</span><br><br>
    <p>Направление:</p>
    <input type="text" name="direction"><br><br>
    <input type="submit" name="button" value="Поехали"><br>
</form>
<div class="res container">
    <h1 class="res">Результат:</h1>
    <?php
    $car = new Car($_GET['name'], $_GET['distance'], $_GET['speed'], $_GET['direction']);

    $car->move() . '<br>';

    unset($_GET);
    ?>
    <br><br>
    <hr>
</div>
</body>
</html>
