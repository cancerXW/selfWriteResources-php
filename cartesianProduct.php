<?php
/**
 * 笛卡尔乘积
 */


/**
 * 笛卡尔乘积-递归版
 * @param $arr 要转换成笛卡尔乘积的二维数组 使用之前请用array_values()对数组进行序列化（0 1 2 3）数组下标必须有序
 * @param int $depth 用于递归的层级
 * @param array $_arr 用于递归数据
 * @param array $returnArr 用于递归数据
 * @return array 转换成笛卡尔乘积的一维数组
 */

function cartesianProduct($arr, $depth = 0, &$_arr = [], &$returnArr = [])
{
    for ($i = 0; $i < count($arr[$depth]); $i++) {
        $_arr[$depth] = $arr[$depth][$i];
        if ($depth < count($arr) - 1) {
            cartesianProduct($arr, $depth + 1, $_arr, $returnArr);
        } else {
            $returnArr[] = implode(',', $_arr);
        }
    }
    return $returnArr;
}
