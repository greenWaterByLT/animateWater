<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/9/1
 * Time: 17:11
 */
namespace including\service;

use core\lib\log;
class LogService{

    /**
     * 文件日志记录
     */
    static public function fileLog()
    {
        //日志启动
        $log = new log();
        $log->init();
        $log->log('test', 'file_log');
        $log->log($_SERVER, 'file_log');
        $log->operationLog('operationLog => TEST', 'string', 'operation');
        $log->operationLog(array('TEST'.date('Y-m-d H:i:s') => '操作日志，文件记录方式真心麻烦啊！'), 'array', 'operation');
    }

}