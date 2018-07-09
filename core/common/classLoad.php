<?php

/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2018/6/15
 * Time: 14:34
 */

/**
 * @param string $model
 * @return null|Twig_Environment
 * 返回模板对象
 */
function displayModelLoad($model = 'twig')
{
    $modelObj = null;
    switch($model){
        case 'twig':
        default:
            //twig模板引擎
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP . '/view');
            $twig = new \Twig_Environment($loader, array(
                'cache' => CACHE,
                'debug' => DEBUG
            ));

            $modelObj = $twig;
            break;
    }

    return $modelObj;
}