<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/9/4
 * Time: 17:00
 */

namespace learn\controller\demo;

use core\lib\my\controller;
use including\model\userModel;

class demoController extends controller
{
    public function index()
    {
        $userModel = new userModel();
        $where['user_name'] = 'litian';
        $field = array();
        $list = $userModel->select($where, $field);
        $hash['list'] = print_r($list, 1);
        $this->display($hash, 'demo/index.html');
    }
}