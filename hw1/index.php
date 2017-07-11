<?php
// Задание #1
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
echo ' “!|\/’”\ ';
// Каждая фраза должна начинаться с новой строки
echo '<hr>Каждое <br>слово <br>должно <br>начинаться <br>с <br>новой <br>строки<hr>';


//Задание #2
//
// Дана задача: На школьной выставке 80 рисунков. 23 из них выполнены фломастерами, 40 карандашами,
// а остальные — красками. Сколько рисунков, выполненные красками, на школьной выставке?
define('DRAWINGS', 80);
$markers = 23;
$pencils = 40;
// Описать и вывести условия, решение этой задачи на PHP. Все числа должны быть указаны в переменных.
echo $paints = DRAWINGS - 23 - 40;
echo '<hr>';
// Задание #3
//
// Создайте константу и присвойте ей значение.
define('CONSTABLE', 'triple');
// Проверьте, существует ли константа, которую Вы хотите использовать
// Выведите значение созданной константы
if (defined('consta') == true) echo "Константа const объявлена! Её значение равно: " . CONSTABLE;
// Попытайтесь изменить значение созданной константы.
// echo CONSTABLE = CONSTABLE . 'loftschool'; //НЕ меняется

// Задание #4
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
if ($age > 18 && $age < 65) {
    echo 'Вам   еще работать   и   работать';
} elseif ($age > 65) {
    echo 'Вам   пора   на   пенсию';
} elseif ($age > 1 && $age <= 17) {
    echo 'Вам   ещё   рано   работать';
} elseif ($age < 1 || $age > 120) {
    echo 'Неизвестный   возраст';
}
echo '<hr>';
// Задание #5
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
// Задание #6
//
// Создайте массив $bmw с ячейками:
// model
// speed
// doors
// year
$bmw = [model, speed, doors, year];
echo $bmw;
//  Заполните ячейки значениями соответсвенно: “X5”, 120, 5, “2015”
// Создайте   массивы   $toyota   и   $opel   аналогичные   массиву   $bmw   (заполните  данными)
// Объедините три массива в один многомерный массив
// Выведите значения всех трех массивов в виде:
