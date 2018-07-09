<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2018/6/21
 * Time: 14:40
 */

namespace learn\controller;

use core\lib\my\controller;

class cssController extends controller
{
    public function index()
    {

    }

    public function createBall()
    {
        $hash['title'] = '小球效果';
        $this->display($hash, 'css/create_ball.html');
    }
}