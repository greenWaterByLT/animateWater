<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2018/6/15
 * Time: 13:55
 */

namespace including\service;

use \CacheKey;

class Test
{
    static public function test()
    {
        $key = CacheKey::test_key('a');

    }
}