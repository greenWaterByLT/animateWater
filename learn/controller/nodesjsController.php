<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/9/4
 * Time: 16:14
 */
namespace learn\controller;

use core\lib\my\controller;

class nodesjsController extends controller
{
    public function index()
    {
        $hash = array();

        $this->display($hash, 'nodesjs/index.html');
    }
}