<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/17
 * Time: 11:34
 * 链接数据库类
 */
namespace core\lib\mysql;

use core\lib\config;

class pdo extends \PDO{

    public function __construct()
    {
        //连接数据库
        $mysql = config::allConfig('mysql');
        $dsn = $mysql['DNS'];
        $username = $mysql['USERNAME'];
        $password = $mysql['PASSWORD'];
        try {
            parent::__construct($dsn, $username, $password);
        }catch(\PDOException $e){
            p($e->getMessage());
        }
    }
}