<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/9/4
 * Time: 16:52
 */

namespace including\service;

class PublicService
{
    /**
     * @param $string   要过滤的字符串
     * @return string   过滤后的字符串
     * 在字符串入库前对字符串进行过滤
     */
    public static function stringDealBeforeSql($string)
    {
        $string = trim($string);
        if (!empty($string)) {
            $string = str_replace("'", '', $string);          //过滤单引号（英文输入法下的）
            $string = self::filter_emoji($string);          //过滤表情
        }
        $string = trim($string);
        return $string;
    }

    /**
     * @param $str
     * @return mixed|string
     * 过滤表情
     */
    public static function filter_emoji($str)
    {
        return self::filterMutilByteSpecialChar($str);
        $clean_text = "";

        // Match Emoticons
//        $regexEmoticons = '/[\x{1F600}-\x{1F64F}]/u'; // 无法匹配 8字节的 英国国旗 emoji 扩大范围
//        $regexEmoticons = '/[\x{1F1E7}-\x{1F64F}]/u';
        $regexEmoticons = '/[\x{1F000}-\x{1F64F}]/u'; // 继续扩大范围
        $clean_text = preg_replace($regexEmoticons, '', $str);

        // Match Miscellaneous Symbols and Pictographs
        $regexSymbols = '/[\x{1F300}-\x{1F5FF}]/u';
        $clean_text = preg_replace($regexSymbols, '', $clean_text);

        // Match Transport And Map Symbols
        $regexTransport = '/[\x{1F680}-\x{1F6FF}]/u';
        $clean_text = preg_replace($regexTransport, '', $clean_text);

        // Match Miscellaneous Symbols
        $regexMisc = '/[\x{2600}-\x{26FF}]/u';
        $clean_text = preg_replace($regexMisc, '', $clean_text);

        // Match Dingbats
        $regexDingbats = '/[\x{2700}-\x{27BF}]/u';
        $clean_text = preg_replace($regexDingbats, '', $clean_text);

        //过滤上面未能过滤的多字节字符
        if (!empty($clean_text)) {
            $clean_text = self::filterMutilByteSpecialChar($clean_text);
        }

        return $clean_text;
    }

    /**
     * 过滤多字节字符
     * @param  $string
     * @return string
     */
    public static function filterMutilByteSpecialChar($string)
    {
        $str = '';
        $array = array();
        $strlen = mb_strlen($string, 'UTF-8');
        while ($strlen) {
            $s = mb_substr($string, 0, 1, 'UTF-8');
            if (strlen($s) < 4) {
                $str .= $s;
            }
            $string = mb_substr($string, 1, $strlen, 'UTF-8');
            $strlen = mb_strlen($string, 'UTF-8');
        }
        $str = trim($str);
        $str = str_replace('　', '', $str);
        return $str;
    }

}