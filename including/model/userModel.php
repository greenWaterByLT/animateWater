<?php
/**
 * Created by PhpStorm.
 * User: litian
 * Date: 2017/4/7
 * Time: 17:36
 */
namespace including\model;

class userModel extends model
{
    public $_name = 'user';

    public function __construct()
    {
        $this->_table = $this->_name;
        parent::__construct();
    }

}