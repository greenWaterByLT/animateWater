<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/11
 * Time: 16:09
 * 加载配置类
 */
namespace core\lib;

class config
{
    static public $_conf;
    static public function getConfig($name, $file)
    {
        /**
         * 1、判断配置文件是否存在
         * 2、判断配置是否存在
         * 3、缓存配置
         */
        if(isset(self::$_conf[$file][$name])){
            return self::$_conf[$file][$name];
        }else {
            $path = CORE . '/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$_conf[$file][$name] = $conf[$name];
                    return $conf[$name];
                } else {
                    throw new \Exception('找不到配置参数:' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件:' . $path);
            }
        }
    }

    static public function allConfig($file)
    {
        if(isset(self::$_conf[$file])){
            return self::$_conf[$file];
        }else {
            $path = CORE . '/config/' . $file . '.php';
            if (is_file($path)) {
                $conf = include $path;
                self::$_conf[$file] = $conf;
                return $conf;
            } else {
                throw new \Exception('找不到配置文件:' . $path);
            }

        }
    }
}
