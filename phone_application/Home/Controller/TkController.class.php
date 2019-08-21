<?php
/**
 * +----------------------------------------------------------------------
 * | AustinBlog
 * +----------------------------------------------------------------------
 * | Copyright (c) 2006-2016 http://itaustin.cn All rights reserved.
 * +----------------------------------------------------------------------
 * | Author: PaulAustin <itwowaustin@gmail.com>
 * +----------------------------------------------------------------------
 * | CreateTime  2018/11/2  下午2:42
 * +----------------------------------------------------------------------
 */
namespace Home\Controller;
use Think\Controller;

class TkController extends Controller{
    public function __construct()
    {
        parent::__construct();
        if (empty($_COOKIE['userID']) && !isset($_COOKIE['userID'])) {
            header("Location: /Login/");
        }
    }

    public function index()
    {
        $this->display();
    }

    public function ti()
    {
        $this->display();
    }
    
    public function topic()
    {
        $this->display();
    }
    public function topic1()
    {
        $this->display();
    }
}