<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/24
 * Time: 16:34
 */
namespace core\lib\mysql;

use core\lib\config;

class medoo extends \Medoo\Medoo
{

    public function __construct()
    {
        $config = config::allConfig('mysql');
        $option = array(
            'database_type' => $config['DB_TYPE'],
            'database_name' => $config['DB_NAME'],
            'server' => $config['HOST'],
            'username' => $config['USERNAME'],
            'password' => $config['PASSWORD'],
            'charset' => 'utf8',
        );
        try {
            parent::__construct($option);
        }catch(\PDOException $e){
            p($e->getMessage());
        }
    }
}