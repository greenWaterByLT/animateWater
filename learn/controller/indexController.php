<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/7
 * Time: 17:10
 */
namespace learn\controller;

use core\lib\my\controller;
use including\model;
use including\model\userModel;
use including\service;
use including\service\PublicService;


class indexController extends controller
{
    public function index()
    {
        $isLogin = $this->getPost('isLogin', '');
        if($isLogin == 'YES'){  //登录
            $userName = $this->getPost('userName', '');
            $password = $this->getPost('password', '');
            $userName = PublicService::stringDealBeforeSql($userName);
            $code = 0;
            if(!empty($userName) && !empty($password)){
                $userModel = new userModel();
                $userInfo = $userModel->find(array('user_name' => $userName), array());
                if(!empty($userInfo)){
                    if(isset($userInfo['password']) && $userInfo['password'] == $password) {
                        $code = 1;
                        $msg = '登录成功';
                    }else{
                        $msg = '密码匹配错误';
                    }
                }else{
                    $msg = '用户名不存在';
                }
            }else{
                $msg = '用户名与密码必填';
            }
            $this->ajaxReturn(array('code' => $code, 'msg' => $msg));
        }
        $hash['title'] = '登录';
        $this->display($hash, 'login.html');
    }

    public function register()
    {
        $isRegister = $this->getPost('isRegister', '');
        if($isRegister == 'YES'){

        }
        $hash['title'] = '注册';
        $this->display($hash, 'register.html');
    }


    public function catalog()
    {
        $hash['title'] = '目录';
        $this->display($hash, 'catalog.html');
    }
}