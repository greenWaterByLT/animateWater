<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2018/6/19
 * Time: 17:19
 */

namespace learn\controller;

use core\lib\my\controller;

class jsController extends controller
{
    function index()
    {
    	
    }

    function ball()
    {
        $hash['title'] = '小球碰撞';
        $this->display($hash, 'js/ball_collision.html');
    }
}