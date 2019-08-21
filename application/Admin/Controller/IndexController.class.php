<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class IndexController extends BaseController {
    public function index(){
    	$admin=$_SESSION['admin'];
        
        $danyelist = M("lanmu")->where("controller='Danye'")->order("id asc")->select();
    	$this->assign("danyelist",$danyelist);
    	
        /*$newlist = getlanmuList('NewList');
        $this->assign("lanmu",$newlist);*/
    	
        $this->display();
    }
    public function welcome(){
    	$this->display();
    }
}