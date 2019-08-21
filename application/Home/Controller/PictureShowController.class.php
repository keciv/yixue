<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class PictureShowController extends BaseController{
    public function index(){
    	$contentid=$_GET['contentid'];
        $new=M("picture")->where("id={$contentid}")->find();
        // print_r($new);
        $this->assign("new",$new);        
        $LastNext = LastNext($contentid,$new["parentID"],"picture","没有了");
        $this->assign("LastNext",$LastNext); 

        $this->display();
    }
}