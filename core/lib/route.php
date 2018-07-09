<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/6
 * Time: 15:08
 * 路由类
 */
namespace core\lib;

class route{
    public $_controller;
    public $_action;

    public function __construct()
    {
        //解析URL
        /**
         * 不同nginx获取其他的url不同
         * 正常：xxx.xx.com/index.php/index/index;一般输入网址要去掉中间的index.php，看起来美观些
         * 1、隐藏index.php:不同的nginx/apache是不同的方法，具体百度
         * 2、获取URL参数部分
         * 3、返回控制器与方法
         */
        if(isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/'){
            $path = $_SERVER['REQUEST_URI'];
            $func = 'urlAnalysis'.URL_WAY;
            $this->$func($path);
        }else{
            $this->_controller = config::getConfig('CONTROLLER', 'route');
            $this->_action = config::getConfig('ACTION', 'route');
        }
    }

    private function urlAnalysis0($path)
    {
        /* /index/index?a=b&b=3 此种路由中get参数已存在，不需要解析 */
        $path = substr($path, 0, strpos($path, '?'));
        $pathArr = explode('/', trim($path, '/'));
        if(isset($pathArr[0])){
            $this->_controller = $pathArr[0];
        }
        $this->_action = isset($pathArr[1]) ? $pathArr[1] : config::getConfig('ACTION', 'route');
        //action 解析
        $this->actionAnalysis();
    }

    private function urlAnalysis1($path)
    {
        /* /index/index/a/2/b/3 此种路由中get参数不存在，需要解析 */
        $pathArr = explode('/', trim($path, '/'));
        if(isset($pathArr[0])){
            $this->_controller = $pathArr[0];
            unset($pathArr[0]);
        }
        if(isset($pathArr[1])){
            $this->_action = $pathArr[1];
            unset($pathArr[1]);
        }else{
            $this->_action = config::getConfig('ACTION', 'route');
        }
        //解析参数
        $count = count($pathArr);
        $i = 2;
        while($count > 0){
            $f = $i + 1;
            $_GET[$pathArr[$i]] = isset($pathArr[$f]) ? $pathArr[$f] : '';
            $i = $f + 1;
            $count -= 2;
        };
        //action 解析
        $this->actionAnalysis();
    }

    private function actionAnalysis()
    {
        /* get-data 这类action解析 将-后的字母改成大写 */
        $action = $this->_action;
        $actionArr = empty($action) ? array() : explode('-', $action);
        if(!empty($actionArr) && count($actionArr) > 1){
            $actionStr = '';
            foreach($actionArr as $k => $v){
                $actionStr .= $k > 0 ? ucfirst($v) : $v;
            }
            $this->_action = $actionStr;
        }
    }
}