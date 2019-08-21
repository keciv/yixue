<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends BaseController{
    //空操作_empty()方法
    public function _empty(){
        // header("HTTP/1.0 404 Not Found");
        @header("http/1.1 404 not found"); 
        @header("status: 404 not found"); 
        
        $this -> display("Index:404");
    }
    
    public function index(){
        // header("HTTP/1.0 404 Not Found");
        @header("http/1.1 404 not found"); 
        @header("status: 404 not found"); 
        $webInfo = webInfo();
        $this->assign("webInfo",$webInfo);

        $this -> display("Index:404");
    }
}