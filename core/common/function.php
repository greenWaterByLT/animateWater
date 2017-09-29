<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/6
 * Time: 14:42
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