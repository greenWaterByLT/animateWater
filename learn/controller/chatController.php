<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2018/9/28
 * Time: 10:59
 * php socket + websocket 聊天室
 */

namespace learn\controller;

use core\lib\my\controller;
class chatController extends controller
{
    public function index()
    {
        $hash['title'] = '聊天室';

        $this->display($hash, 'chat/index.html');
    }
}