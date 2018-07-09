<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/6
 * Time: 14:18
 * 入口文件要求
 * 1、定义常量
 * 2、加载函数库
 * 3、启动框架
 */

include './core/define.php';        //定义常量
//设置时区
ini_set('date.timezone','Asia/Shanghai');

//加载composer 下载安装的类库
include LIBRARY . '/vendor/autoload.php';

//调试，是否显示PHP错误
if(DEBUG){
    //试用filp/whoops错误调试
    $whoops = new \Whoops\Run;
    $option = new \Whoops\Handler\PrettyPageHandler();
    $option->setPageTitle('(╥╯^╰╥)框架出错啦');
    $whoops->pushHandler($option);
    $whoops->register();
    ini_set('display_errors','On');
}else{
    ini_set('display_errors','Off');
}

include CORE.'/common/function.php';        //加载函数库

include CORE.'/common/classLoad.php';        //加载配置函数库


include CORE.'/imooc.php';

//自动加载类
spl_autoload_register('\core\imooc::load');

\core\imooc::run();     //启动框架

