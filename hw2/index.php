<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            -webkit-transition: all .3s;
            transition: all .3s;
            background: url(http://subtlepatterns.com/patterns/subtlenet2.png);
            font-weight: 400;
            font: 16px 'PT Sans', Tahoma, Arial;
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php
require('functions.php');
//1
$arr = ['Привет', 'школа', 'LoftSchool'];
echo task1($arr, true);
echo '<hr>';

//2
$int = [0, 2, 3, 4];
echo task2($int, "*"); // + - * /
echo '<hr>';

//3
echo task3("*", 100, 2, 3, 4); // + - * /
echo '<hr>';

//4
echo task4(7, 7);
echo '<hr>';

//5
task5('Ка за к'); // Аргентина манит негра
echo '<hr>';

//6
task6();
echo '<hr>';

//7
task7('Карл у Клары украл Кораллы', 'Две бутылки лимонада');
echo '<hr>';

//8
task8('RX packets:950381  :) errors:0 dropped:0 overruns:0 frame:0');
echo '<hr>';

//9
task9('test.txt');
echo '<hr>';

//10
task10('anothertest.txt');
echo '<hr>';
?>
</body>
</html>