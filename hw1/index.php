<?php
//Задание #1
//
// Создайте   переменную   $name   и   присвойте   ей   строковое   значение   содержащее  Ваше имя
$name = 'Denis';
//Создайте   переменную   $age   и   присвойте   ей   строковое   значение   содержащее   Ваш  возраст
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

//Задание #3
//
//Создайте константу и присвойте ей значение.
define('CONSTABLE', 'triple');
//Проверьте, существует ли константа, которую Вы хотите использовать
//Выведите значение созданной константы
if (defined('consta') == true) echo "Константа const объявлена! Её значение равно: " . CONSTABLE;
//Попытайтесь изменить значение созданной константы.
//echo CONSTABLE = CONSTABLE . 'loftschool'; //НЕ меняется

//Задание #4
//
//Создайте переменную $age
//Присвойте переменной $age произвольное числовое значение
$age = 50;
//Напишите   конструкцию   if,   которая   выводит   фразу:   “Вам   еще работать   и   работать”  при   условии   что   значение   переменной
//   $age   попадает   в   диапазон   чисел   от   18   до   65  (включительно)
if ($age > 18 && $age < 65) {
    echo 'Вам   еще работать   и   работать';
}
//Расширьте   конструкцию   if,   выводя   фразу:   “Вам   пора   на   пенсию”   при   условии,   что  значение переменной $age больше 65
//Расширьте   конструкцию   ­elseif,   выводя   фразу:   “Вам   ещё   рано   работать”   при  условии,   что   значение   переменной   $age
//   попадает   в   диапазон   чисел   от   1   до   17  (включительно)
//Дополните   конструкцию   if­elseif,   выводя   фразу:   “Неизвестный   возраст”   при  условии,   что   значение   переменной   $age
//   не   попадет   в   вышеописанные   диапазоны чисел
