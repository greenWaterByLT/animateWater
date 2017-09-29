<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/17
 * Time: 11:37
 * 日志类
 */
namespace core\lib;

class log{

    static public $_class;

    /**
     * 1、确定日志存储方式
     *
     * 2、写日志
     */
    static public function init()
    {
        //确定存储方式
        $drive = config::getConfig('DRIVE', 'log');
        $class = '\core\lib\drive\log\\'.$drive;
        self::$_class = new $class();
    }

    static public function log($name, $file)
    {
        self::$_class->log($name, $file);
    }

    static public function operationLog($data, $symbol, $file)
    {
        self::$_class->operationLog($data, $symbol, $file);
        self::$_class->operationLog($data, $symbol, $file);
    }

}