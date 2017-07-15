<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        * {
            transition: all 1s;
            box-sizing: border-box;
        }

        body {
            background: url(http://subtlepatterns.com/patterns/grid.png);
            font: 1em 'PT Sans', Helvetica, Tahoma, Arial, sans-serif;
            color: #333;
        }

        .wrapper {
            width: 500px;
            max-width: 800px;
            min-width: 420px;
            margin: 100px auto;
            text-align: center;
        }

        table {
            margin: 0 auto;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="wrapper">
    <?php
    error_reporting(E_ALL);

    ini_set('display_errors', 1);

    echo '<h1>Задание #1</h1>';
    //
    // Создайте   переменную   $name   и   присвойте   ей   строковое   значение   содержащее  Ваше имя
    $name = 'Denis';
    // Создайте   переменную   $age   и   присвойте   ей   строковое   значение   содержащее   Ваш  возраст
    $age = '33';
    // Выведите   с   помощью   echo   (или   print)   фразу   “Меня   зовут:   ​ваше_имя​”   например:  “Меня зовут: Игорь”
    echo 'Меня зовут: ' . $name . '<br>';
    // Выведите фразу “Мне ​ваш_возраст​ лет”, например: “Мне 99 лет”
    echo 'Мне ' . $age . ' года';
    // Выведите следующий набор символов, включая кавычки - “!|\/’”\ (двойная кавычка, воскл. знак, вертикальная черта, обратный слэш, слэш, кавычка, двойная кавычка, обратный слэш)
    echo '<br> “!|\/’”\ ';
    // Каждая фраза должна начинаться с новой строки
    echo '<hr>Каждое <br>слово <br>должно <br>начинаться <br>с <br>новой <br>строки<hr>';


    echo '<h1>Задание #2</h1>';
    //
    // Дана задача: На школьной выставке 80 рисунков. 23 из них выполнены фломастерами, 40 карандашами,
    // а остальные — красками. Сколько рисунков, выполненные красками, на школьной выставке?
    define('DRAWINGS', 80);
    $markers = 23;
    $pencils = 40;
    // Описать и вывести условия, решение этой задачи на PHP. Все числа должны быть указаны в переменных.
    echo $paints = DRAWINGS - $markers - $pencils;
    echo '<hr>';


    echo '<h1>Задание #3</h1>';
    //
    // Создайте константу и присвойте ей значение.
    define('CONSTABLE', 'triple');
    // Проверьте, существует ли константа, которую Вы хотите использовать
    // Выведите значение созданной константы
    if (defined('CONSTABLE') == true) echo "Константа CONSTABLE объявлена! Её значение равно: " . CONSTABLE;
    // Попытайтесь изменить значение созданной константы.
    // echo CONSTABLE = CONSTABLE . 'loftschool'; //НЕ меняется
    echo '<hr>';


    echo '<h1>Задание #4</h1>';
    //
    // Создайте переменную $age
    // Присвойте переменной $age произвольное числовое значение
    $age = 50;
    // Напишите   конструкцию   if,   которая   выводит   фразу:   “Вам   еще работать   и   работать”  при   условии   что   значение   переменной
    //   $age   попадает   в   диапазон   чисел   от   18   до   65  (включительно)
    // Расширьте   конструкцию   if,   выводя   фразу:   “Вам   пора   на   пенсию”   при   условии,   что  значение переменной $age больше 65
    // Расширьте   конструкцию   ­elseif,   выводя   фразу:   “Вам   ещё   рано   работать”   при  условии,   что   значение   переменной   $age
    //   попадает   в   диапазон   чисел   от   1   до   17  (включительно)
    // Дополните   конструкцию   if­elseif,   выводя   фразу:   “Неизвестный   возраст”   при  условии,   что   значение   переменной   $age
    //   не   попадет   в   вышеописанные   диапазоны чисел
    if ($age >= 18 && $age <= 65) {
        echo 'Вам   еще работать   и   работать';
    } elseif ($age > 65) {
        echo 'Вам   пора   на   пенсию';
    } elseif ($age > 1 && $age <= 17) {
        echo 'Вам   ещё   рано   работать';
    } elseif ($age < 1 || $age > 120) {
        echo 'Неизвестный   возраст';
    }
    echo '<hr>';


    echo '<h1>Задание #5</h1>';
    //
    // Создайте переменную $day и присвойте ей произвольное числовое значение
    $day = 5;
    // С   помощью   конструкции   switch   выведите   фразу   “Это   рабочий   день”,   если   значение  переменной $day попадает в диапазон чисел от 1 до 5 (включительно)
    // Выведите   фраху   “Это   выходной   день”,   если   значение   переменной   $day   равно  числам 6 или 7
    // Выведите   фразу   “Неизвестный   день”,   если   значение   переменной   $day   не   попадает  в диапазон чисел от 1 до 7 (включительно)
    switch ($day) {
        case 1:
            echo "Это рабочий день";
            break;
        case 2:
            echo "Это рабочий день";
            break;
        case 3:
            echo "Это рабочий день";
            break;
        case 4:
            echo "Это рабочий день";
            break;
        case 5:
            echo "Это рабочий день";
            break;
        case 6:
            echo "Это выходной день";
            break;
        case 7:
            echo "Это выходной день";
            break;
        default:
            echo "Неизвестный день";
    }
    echo '<hr>';


    echo '<h1>Задание #6</h1>';
    //
    // Создайте массив $bmw с ячейками:
    // model
    // speed
    // doors
    // year
    //  Заполните ячейки значениями соответсвенно: “X5”, 120, 5, “2015”
    // Создайте   массивы   $toyota   и   $opel   аналогичные   массиву   $bmw   (заполните  данными)
    $bmw = [
            'model' => 'X5',
            'speed' => 120,
            'doors' => 5,
            'year' => 2015
    ];
    $toyota = [
            'model' => 'corolla',
            'speed' => 160,
            'doors' => 4,
            'year' => 2016
    ];
    $opel = [
            'model' => 'zafira',
            'speed' => 120,
            'doors' => 5,
            'year' => 2010
    ];
    // Объедините три массива в один многомерный массив
    $auto = ['bmw' => $bmw, 'toyota' => $toyota, 'opel' => $opel];

    foreach ($auto as $key => $value) {


        echo '*************<h4>CAR ' . $key . '</h4>';
        echo '<h4 style="display: inline-block;">' . $value['model'] . '&nbsp;</h4>' .
            $value['speed'] . ' ' .
            $value['doors'] . ' ' .
            $value['year'] . ' ' .
            "<br><br>";
    }
    echo '<hr>';

    echo '<h1>Задание #7</h1>';
    //
    // Используя цикл for, выведите таблицу умножения размером 10x10. Таблица должна быть выведена с помощью HTML тега <table>
    // Если значение индекса строки и столбца чётный, то результат вывести в круглых скобках.
    // Если значение индекса строки и столбца Нечётный, то результат вывести в квадратных скобках.
    // Во всех остальных случаях результат выводить просто числом.
    echo '<table style="border: 1px solid #777;">';
    for ($x = 1; $x < 11; $x++) {
        echo '<tr>';
        for ($y = 1; $y < 11; $y++) {
            $a = $x * $y;
            if (($y % 2) == 0 && ($x % 2) == 0) {
                $a = '(' . $a . ')';
            } elseif (($y % 2) != 0 && ($x % 2) != 0) {
                $a = '[' . $a . ']';
            }
            echo '<td style="border:1px solid #777;min-width:25px;text-align:center;">' . $a . '</td>';
        };
        echo '</tr>';
    };
    echo '</table>';
    echo '<hr>';


    echo '<h1>Задание #8</h1>';
    //
    // Создайте переменную $str, которой присвойте строковое значение, содержащее отдельные слова разделённые пробелом.
    $str = 'Привет LoftSchool, надеюсь я стану WEB разработчиком, и научусь зарабатывать: 100000 рублей в месяц.';
    // Выведите строку на экран.
    echo $str;
    // Затем разбейте строку на массив. Выведите массив. Затем используя циклы while или do-while (на ваше усмотрение)
    // развернуть массив и склеить в строку используя любой символ, кроме пробела. Вывести результат.
    $str = explode(" ", $str);

    echo '<pre style="text-align: left;">';
    print_r($str);
    echo '</pre>';

    $z = count($str);

    while ($z > 0) {
        if ($z == 1) {
            $z--;
            echo $str[$z];
        } else {
            $z--;
            echo $str[$z] . ' + ';
        }
    }
    echo '<hr>';
    ?>
</div>
</body>
</html>