<?php
/**
 * Created by PhpStorm.
 * User: beloc
 * Date: 19.07.2017
 * Time: 16:08
 */

function task1($arr, $bool = false)
{
    if ($bool && count($arr) > 0) {
        $str = " ";
        for ($i = 0; $i < count($arr); ++$i) {
            $str = $str . $arr[$i] . ' ';
        }
        return $str;
    } elseif (!$bool) {
        for ($j = 0; $j < count($arr); $j++) {
            echo '<p>' . $arr[$j] . '</p>';
        }
    }
}

function task2($int_arr, $operator)
{
    $res = '';
    for ($i = -1; $i < count($int_arr); ++$i) {
        /*        if ($res != '') {*/
        $res = "$res $operator $int_arr[$i]";
        /*        } elseif ($res == '') {
                    $res = $int_arr[$i];
                }*/
    }
    return $res;
}
