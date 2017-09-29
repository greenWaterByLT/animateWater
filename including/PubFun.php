<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/19
 * Time: 14:13
 * 功能类
 */
namespace including;

class PubFun
{

    /**
     * @param $file 文件路径名称
     * 文件不存在就创建文件，否就不处理
     */
    static public function createFile($file)
    {
        if (!is_file($file)) {
            $fh = fopen($file, 'w+');
            fclose($fh);
        }
    }

    /**
     * @param $dirName          目录路径
     * @param boolean $type     是否删除不目录
     * 循环删除目录和文件函数,默认此目录不会被删除
     */
    static public function delDirAndFile($dirName, $type = false)
    {
        $handle = opendir($dirName);
        if ($handle) {
            $bool = true;
            while($bool !== false){
                $bool = readdir($handle);
                /**
                 * 1、readdir->一次读取目录下的缩影目录与文件，读取结束返回false，否则返回文件或目录名称
                 * 2、$bool in ('.','..')->这是两个特殊目录
                 * 3、遇到目录递归此方法，并在结束后删除目录；否则删除文件
                 */
                if($bool && $bool != '.' && $bool != '..') {
                    $dir = $dirName . '/' . $bool;
                    if (is_dir($dir)) {
                        self::delDirAndFile($dir);
                        rmdir($dir);
                    } else {
                        unlink($dir);
                    }
                }
            }
            if($type) {     //删除本目录
                rmdir($dirName);
            }
        }
        closedir($handle);
    }

    static public function readFile($file)
    {
        /**
         * 1、判断是否存在这个文件，否则抛错
         * 2、以可读方式读取文件（注：不要以w或w+方式读取文件，会清空文件内容的）
         *  fopen($file) 返回的是文件指针指向
         * 3、判断文件指针指向是否到文件尾（feof($fh)）
         *  文件读取是会改变文件指针指向
         */
        if (is_file($file)) {
            $fileContent = '';
            $fh = fopen($file, 'r');
            while (!feof($fh)) {
                $fileContent = fread($fh, 1024);
            }
            fclose($fh);
            return $fileContent;
        } else {
            throw new \Exception('文件：' . $file . '不存在');
        }
    }
}