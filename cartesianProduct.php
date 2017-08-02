<?php
/**
 * 笛卡尔乘积
 */


/**
 * 笛卡尔乘积-递归版
 * @param $arr 要转换成笛卡尔乘积的二维数组
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
