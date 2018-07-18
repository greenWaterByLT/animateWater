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

function p_r($var, $title, $bool = false)
{
    echo "###################################" . $title . "##################################</br></br>";
    p($var, $bool);
    echo "</br>###################################################################################</br>";
}