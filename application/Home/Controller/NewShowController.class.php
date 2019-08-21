<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class NewShowController extends BaseController{
    public function index(){
    	$contentid=$_GET['contentid'];
    	$new=M("news")->where("id={$contentid}")->find();
    	$this->assign("new",$new);        

        $LastNext = LastNext($contentid,$new["parentID"],"news","没有了");
        $this->assign("LastNext",$LastNext);

    	$this->display();
    }
}