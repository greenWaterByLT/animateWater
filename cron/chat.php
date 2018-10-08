<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2018/9/29
 * Time: 16:30
 */

include 'lib/header.php';

require_once(__CORE__ . '/lib/extend/chat/SocketChat.php');

Chat::init();

class Chat
{
    static public function init()
    {
        if (version_compare(phpversion(), "5.4.0", "lt")) {
            exit('php version must greater than 5.4.0');
        }
        ob_implicit_flush();

        //run server
        $port = 8083;

        new SocketChat($port);
    }
}