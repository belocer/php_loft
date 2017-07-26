<?php
function task1()
{
    /*    header("Content-Type: text/xml");
        $xml_res = simplexml_load_file('data.xml');
        $xml_res = simplexml_load_string($xml_res);
        //echo '<pre>';
        print_r($xml_res);
        //echo '</pre>';*/

    $handle = fopen('data.xml', "r");
    $contents = fread($handle, filesize('data.xml'));
    echo $contents;
    fclose($handle);
}

function task2()
{
    $array = [
        'ps4' => [
            'Killzone:' => 'В плену сумрака ',
            'inFAMOUS:' => 'Второй сын',
            'The Order:' => 1886,
            'Uncharted 4:' => 'Путь вора'
        ],

        'xbox one' => [
            'Forza' => 'Motorsport 5',
            'Forza:' => 'Horizon 2',
            'Dead Rising' => 3,
            'Halo:' => ' The Master Chief Collection'
        ]
    ];
    /*
     * Преобразую в JSON формат и записываю массив в файл
     * ========================================================================*/
    $jsonString = json_encode($array);
    file_put_contents('output.json', $jsonString);
    /*
     * Открываю output.json добавляю элемент в массив сохраняю как output2.json
     * ========================================================================*/
    $jsonPath = './output.json';
    $jsonFile = file_get_contents($jsonPath);
    $jsonArray = json_decode($jsonFile, true);
    $arrayPlus = [
        'Xenoblade' => 'Chronicles 2',
        'Bomberman' => 'R',
        'Splatoon' => '2'
    ];
    $jsonArray['Nintendo Switch'] = $arrayPlus;
    $jsonString1 = json_encode($jsonArray);
    file_put_contents('output2.json', $jsonString1);
    /*
     * Открываю оба файла, сравниваю содержимое
     * ========================================================================*/
    $jsonPath1 = './output.json';
    $jsonPath2 = './output2.json';
    $jsonFile1 = file_get_contents($jsonPath1);
    $jsonFile2 = file_get_contents($jsonPath2);
    $jsonArray1 = json_decode($jsonFile1, true);
    $jsonArray2 = json_decode($jsonFile2, true);

    if (count($jsonArray1) > count($jsonArray2)) {
        echo 'Первый массив больше второго <br>';
    } elseif (count($jsonArray2) > count($jsonArray1)) {
        echo 'Второй массив больше первого <br>';
    } elseif (count($jsonArray1) === count($jsonArray2)) {
        /*        for ($i = 0; $i < count($jsonArray1); $i++) {
                    if ($jsonArray1[$i] != $jsonArray2[$i]) {
                        echo 'элементы массива 1' . $jsonArray1[$i];
                        echo 'элементы массива 2' . $jsonArray2[$i];
                    }
                    for ($x = 0; $x < count($jsonArray1[$i]); $x++) {
                        echo $jsonArray1[$i][$x] . '<br>';
                        echo $jsonArray2[$i][$x] . '<br>';
                        if ($jsonArray1[$i][$x] != $jsonArray2[$i][$x]) {
                            echo 'элементы массива 1' . $jsonArray1[$i][$x];
                            echo 'элементы массива 2' . $jsonArray2[$i][$x];
                        } else {
                            echo 'ПХП думает, что элементы равны, они равны вот этому: ' . $jsonArray1[$i][$x] . ' ' . $jsonArray2[$i][$x];
                        }
                    }
                }*/

        echo $res = rec($jsonArray1, $jsonArray2);
    }
}

function rec($jsonArray1, $jsonArray2)
{
    echo '<pre>';
    print_r($jsonArray1);
    print_r($jsonArray2);
    echo '</pre>';
    for ($i = 0; $i < count($jsonArray1); $i++) {
        if (is_array($jsonArray1[$i]) && is_array($jsonArray1[$i])) {
            rec($jsonArray1[$i], $jsonArray2[$i]);
        }
        if ($jsonArray1[$i] !== $jsonArray2[$i]) {
            return $res1 = 'элементы массива 1' . $jsonArray1[$i] . '<br>' . 'элементы массива 2' . $jsonArray2[$i];
        }
    }
}

function task3()
{

}

function task4()
{

}