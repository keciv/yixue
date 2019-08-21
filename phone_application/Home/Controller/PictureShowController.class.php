<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class PictureShowController extends BaseController{
    public function index(){
    	$contentid=$_GET['contentid'];
        $new=M("picture")->where("id={$contentid}")->find();
      
        $find_lanmu=M("lanmu")->where("id={$new['parentID']}")->find();
    	$new['controller']=$find_lanmu['controller'];
        // print_r($new);
        $this->assign("new",$new);   

        $pinlun=M("liuyan")->where("wenzhangID={$contentid} and controller='PictureList'")->order("id desc")->select();
        $this->assign("pinlun",$pinlun);  
          
        $LastNext = LastNext($contentid,$new["parentID"],"picture","没有了");
        $this->assign("LastNext",$LastNext); 

        $this->display();
    }
}