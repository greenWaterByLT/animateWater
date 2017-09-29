<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/9/1
 * Time: 15:27
 */
namespace core\lib\my;
use core\imooc;

class controller extends imooc
{
    public function __construct()
    {
        $this->assign('root', '/www');
    }

    public function _request($param)
    {
        return $param;
    }

    public function getPost($key = '', $value = '')
    {
        if(empty($key) && empty($value)){
            return $_POST;
        }

        return isset($_POST[$key]) ? $_POST[$key] : $value;
    }

    public function getQuery($key = '', $value = '')
    {
        if(empty($key) && empty($value)){
            return $_GET;
        }

        return isset($_GET[$key]) ? $_GET[$key] : $value;
    }

    public function ajaxReturn($data)
    {
        if (!is_array($data) || !isset($data['code']) || !isset($data['msg'])) {
            $data = array(
                'code' => '10000',
                'msg' => '响应数据非法'
            );
        }
        header('Content-Type:application/json; charset=UTF-8');
        echo json_encode($data);
        exit;
    }
}