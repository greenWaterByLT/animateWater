<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/6
 * Time: 14:42
 */

/**
 * @param $var
 * @param bool $bool    true - 打印phpinfo()， false打印var参数
 * 打印数据
 */
function p($var, $bool = false)
{
    if($bool){
        phpinfo();
    }else{
        if(is_bool($var)){
            var_dump($var);
        }elseif(is_null($var)){
            var_dump(null);
        }else{
            echo '<pre> ' . print_r($var, true) . ' </pre>';
        }
    }
}

/**
 * @param  [type]  $var   [description]
 * @param  [type]  $title [description]
 * @param  boolean $bool  [description]
 * 打印数据 用#间隔并给出每段打印数据名称
 */
function p_r($var, $title, $bool = false)
{
    echo "###################################" . $title . "##################################</br></br>";
    p($var, $bool);
    echo "</br>###################################################################################</br>";
}

/**
 * @param $array    随机数组
 * @param int $length   随机元素个数
 * @return array
 * 获取数组随机几个元素
 */
function arrayRand($array, $length = 0)
{
    $length = empty($length) || $length >= count($array) ? rand(1, count($array) - 1) : $length;
    $keys = array_rand($array, $length);      // 在 数组$array 中随机取 $length 个数组元素键名
    $result = [];
    if(is_array($keys)) {
        for ($i = 0; $i < $length; $i++) {
            $result[] = $array[$keys[$i]];
        }
    }else{
        $result[] = $array[$keys];
    }

    return $result;
}

