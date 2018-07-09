<?php

/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2018/6/15
 * Time: 13:51
 */
class CacheKey
{
    static function test_key($test)
    {
        return __FUNCTION__ . '_' . $test;
    }

}