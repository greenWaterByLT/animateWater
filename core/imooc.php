<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/6
 * Time: 14:59
 */
namespace core;

use including\service\LogService;

class imooc{
    static public $_class = array();
    public $_assign;

    static public function run()
    {
        //LogService::fileLog();  //页面访问日志
        $route = new \core\lib\route();     //路由
        $controller = $route->_controller;
        $action = $route->_action;
        //检测控制器文件是否存在
        $controllerFile = APP.'/controller/'.$controller.'Controller';
        if(is_file($controllerFile.'.php')) {
            include $controllerFile.'.php';
            $controllerObject = str_replace('/', '\\', $controller);
            $controllerClass = '\\'.MODULE.'\\controller\\'.$controllerObject.'Controller';
            $controllerSub = new $controllerClass();
            $controllerSub->$action();
        }else{
            throw new \Exception('找不到控制器文件:'.$controllerFile.'.php');
        }
    }

    //自动加载类库
    static public function load($class)
    {
        //自动加载类库
        //正常加载类库:\core\route()
        //$class = '\core\route'
        //IMOOC.'/core/route.php'   加载类库的正常名称
        $class = str_replace('\\', '/', $class);
        if(substr($class, 0, 1) != '/'){
            $class = '/'.$class;
        }
        if(isset(self::$_class[$class])){
            return true;
        }else {
            $file = IMOOC . $class . '.php';
            if (is_file($file)) {
                include $file;
                self::$_class[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $value)
    {
        $this->_assign[$name] = $value;
    }

    /**
     * @param $hash
     * @param $file
     * 普通的display渲染模板
     */
    public function displayOrigin($hash, $file)
    {
        $filePath = APP.'/view/'.$file;
        if(is_file($filePath)){
            if(!empty($this->_assign))
                extract($this->_assign);        //将$this->_assign数组的数据可以按我们的要求在模版文件里输出
            if(!empty($hash))
                extract($hash);
            unset($hash);
            include $filePath;
        }
    }

    /**
     * @param $hash
     * @param $file
     * @throws \Twig_Error_Runtime
     * twig模板引擎
     */
    public function display($hash, $file)
    {
        $filePath = APP.'/view/'.$file;
        if(is_file($filePath)){
            $assign = empty($this->_assign) ? array() : $this->_assign;
            $hash = empty($hash) ? array() : $hash;
            $result = array_merge($assign, $hash);

            //twig模板引擎
            \Twig_Autoloader::register();
            $loader = new \Twig_Loader_Filesystem(APP.'/view');
            $twig = new \Twig_Environment($loader, array(
                    'cache' => CACHE,
                    'debug' => DEBUG
            ));

            $template = $twig->loadTemplate($file);
            $template->display($result?$result:'');
        }
    }
}