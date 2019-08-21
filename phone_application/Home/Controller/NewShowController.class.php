<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class NewShowController extends BaseController{
    public function index(){
    	$contentid=$_GET['contentid'];
    	$new=M("news")->where("id={$contentid}")->find();
    	
    	$find_lanmu=M("lanmu")->where("id={$new['parentID']}")->find();
    	$new['controller']=$find_lanmu['controller'];
        // print_r($new);
        $this->assign("new",$new);   

        $pinlun=M("liuyan")->where("wenzhangID={$contentid} and controller='PictureList'")->order("id desc")->select();
        $this->assign("pinlun",$pinlun);
          
        $LastNext = LastNext($contentid,$new["parentID"],"news","没有了");
        $this->assign("LastNext",$LastNext);

    	$this->display();
    }

    public function jiaoliu(){
    	$data=array();
    	$data['content']=$_POST['content'];
    	$data['controller']=$_POST['controller'];
    	$data['wenzhangID']=$_POST['wenzhangID'];

    	//过滤html标签
    	$data['content']=strip_tags($data['content']);
		$result=M("liuyan")->add($data);
		
    	if($result>0){
    		$find=M("liuyan")->find($result);
    		$find=json_encode($find);
    		exit($find);
    	}
    	      

    }
}