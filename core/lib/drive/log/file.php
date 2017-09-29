<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/18
 * Time: 14:51
 * 文件系统
 */
namespace core\lib\drive\log;

use core\lib\config;
use including\PubFun;

class file{

    public $path;
    public $operationLog;
    private $configLog = array();

    public function __construct()
    {
        $config = config::getConfig('OPTION', 'log');
        $this->path = $config['PATH'];
    }

    /**
     * @param $message      日志内容
     * @param string $file  日志文件名称
     * @return int
     * 写入日志
     */
    public function log($message, $file = 'log')
    {
        /**
         * 1、确认目录是否存在
         *  否就新建目录
         * 2、写入日志
         */
        $filePath = $this->path . date('YmdH', time());
        if(!is_dir($filePath)){
            mkdir($filePath, 0777, true);
        }
        $fileName = $filePath . '/' . $file . '.php';
        $message = date('Y-m-d H:i:s', time()) . PHP_EOL . json_encode($message);

        return file_put_contents($fileName, $message . PHP_EOL, FILE_APPEND);
    }

    /**
     * @param $data         操作日志数组
     * @param string $file  文件名称
     * @param $symbol       标记：区分在同一时间记录的操作日志
     * @return int
     *  以配置文件的方式写入日志文件
     */
    public function operationLog($data, $symbol, $file = 'operation')
    {
        /**
         * 1、确认目录是否存在
         *  否就新建目录
         * 2、写入日志
         *  以配置文件的方式写入
         *      [1]读取文件，存在就直接读取；否则先创建文件
         *      [2]获取文件的值（按配置文件应该返回应该数据），若是刚创建的文件返回值是int（1），此时给个空数组
         *      [3]var_export函数可以直接以数组的形式写入文件
         */
        $filePath = $this->path . date('YmdH', time());
        if(!is_dir($filePath)){
            mkdir($filePath, 0777, true);
        }
        $fileName = $filePath . '/' . $file . '.php';
        PubFun::createFile($fileName);
        $result = include $fileName;
        $result = !is_array($result) ? array() : $result;
        $result[date('YmdHis') . '_' . $symbol] = $data;
        $message = '<?php ' . PHP_EOL . ' return ' . var_export($result, true) . ';' . PHP_EOL;

        return file_put_contents($fileName, $message);
    }

    /**
     * @param $file         文件名称
     * @param string $dir   目录名称
     * @return array
     *  $key => 目录名称
     *  $value => 日志数据
     * @throws \Exception
     * 读取配置文件日志
     */
    public function readConfigLog($file, $dir = 'log')
    {
        $dirTemp = (strpos($dir, IMOOC) === false) ? IMOOC . '/' . $dir : $dir;
        $file .= (strpos($file, '.php') === false) ? '.php' : '';
        if(is_dir($dirTemp)){
            $handle = opendir($dirTemp);
            if($handle){
                while(false !== $dirContent = readdir($handle)){
                    if($dirContent && $dirContent != '.' && $dirContent != '..'){
                        $dirPath = $dirTemp . '/' . $dirContent;
                        if(is_dir($dirPath)){
                            $this->readConfigLog($file, $dirPath);
                        }else{
                            $fileName = substr($dirPath, strrpos($dirPath, '/') + 1, strlen($dirPath));
                            if($fileName == $file){
                                $temp = substr($dirPath, 0, strrpos($dirPath, '/'));
                                $this->configLog[substr($temp, strrpos($temp, '/') + 1, strlen($temp))] = include $dirPath;
                            }
                        }
                    }
                }
            }
            closedir($handle);
            if($dirTemp == IMOOC . '/' . $dir){
                $result = $this->configLog;
                $this->configLog = array();
                return $result;
            }
        }else{
            throw new \Exception('文件目录：' . $dir . '不存在');
        }
    }

    /**
     * 清除上个月的日志文件
     */
    public function delLastMonthLog()
    {
        $dir = IMOOC . '/log';
        $lastMonth = strtotime("-1 month");
        $month = date('Ym', $lastMonth);
        for($i = 1; $i <= 31; $i++)
        {
            $iStr = strlen($i) > 1 ? $i : '0' . $i;
            $dirDay = $month . $iStr;
            for($f = 0; $f < 24; $f++)
            {
                $fStr = strlen($f) > 1 ? $f : '0' . $f;
                $dirName = $dirDay . $fStr;
                $openDir = $dir . '/' . $dirName;
                if(is_dir($openDir)) {
                    PubFun::delDirAndFile($openDir, true);
                }
            }
        }
    }

    public function delOneMonthAgoLog()
    {
        $dir = IMOOC . '/log';
        $lastMonth = strtotime("-1 month");
        $month = date('YmdH', $lastMonth);
        if(is_dir($dir)){
            $handle = opendir($dir);
            while(false !== $dirName = readdir($handle)){
                if($dirName && $dirName != '.' && $dirName != '..'){
                    $dirPath = $dir . '/' . $dirName;
                    if(is_dir($dirPath) && $dirName < $month){
                        PubFun::delDirAndFile($dirPath, true);
                    }
                }
            }
        }
    }
}