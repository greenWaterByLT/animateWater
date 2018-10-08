<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2018/9/29
 * Time: 16:44
 * 腳本：
 * 常量定義（__STRING__）
 */

    //设置时区
    ini_set('date.timezone','Asia/Shanghai');

    //禁止通过WEB URL进行调用
	if(isset($_SERVER["SERVER_ADDR"]))die($_SERVER["SERVER_ADDR"]);

	ini_set("max_execution_time","0");
	ini_set("memory_limit", "4000M");
	ini_set('display_errors','On');	error_reporting(E_ALL ^ E_NOTICE);

	//脚本常量定义
	define("__ROOT__",dirname(dirname(__FILE__)));      //脚本根路径

    define("__CORE__", dirname(__ROOT__) . "/core");    //扩展引入文件

    define("__DIR_LOG__", CRON.'/log/');    //脚本日志路径

    //引入常量配置文件
    include __CORE__ . '/define.php';

/*
	//检查分布配置是否存在
	$config = dirname(__ROOT__)."/../include/backend/config.ini.release";
	if(!file_exists($config)){
        $config =  dirname(__ROOT__)."/../include/backend/config.ini";
    }

	$setting = parse_ini_file($config, true) or die("Can not find config file!\r\n");
	$_SERVER = array_merge($_SERVER, $setting['server']);

	$_SERVER['HTTP_HOST'] =$setting['cron']['http_host'];*/

	//print_r($_SERVER);

	ob_flush();

?>