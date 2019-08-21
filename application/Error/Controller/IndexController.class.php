<?php
namespace Error\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

    	//优化
    	$title=M("gongsi")->find();
    	$result=explode('_',$title['title']);
    	$title2=$result[count($result)-1];
    		
    	$this->assign("title",$title);
    	$this->assign("title2",$title2);
    $this->display();
    }
}