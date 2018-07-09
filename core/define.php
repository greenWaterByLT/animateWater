<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/6
 * Time: 14:37
 */
//定义文件目录常量
define('IMOOC', realpath('./'));
define('CORE', IMOOC.'/core');
define('FUNCTION_CORE', IMOOC.'/including');
define('APP', IMOOC.'/learn');
define('LIBRARY', IMOOC.'/www');

//模板缓存
//define('CACHE', IMOOC.'/cache');
define('CACHE', false);

//定义目录名称
define('MODULE', 'learn');

//调试常量
define('DEBUG', true);

//路由方式常量
define('URL_WAY', 1);

//数据库使用常量
define('MYSQL_HOST_TYPE', 1);   //0-本地 1-虚拟机 2-其他:2018-6-15 只能连接虚拟机

//全局常量
include FUNCTION_CORE .'/config.php';