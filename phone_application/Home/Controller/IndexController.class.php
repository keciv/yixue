<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController{
    public function index(){
    	
    	$specialty=cookie("special");
    	$allClass=array();
    	if($specialty){
    		$fufeiClass=M("class")->where("class_type=1 AND specialty={$specialty}")->order("id asc")->limit(2)->select();
	    	$mfClass=M("class")->where("class_type=2 AND specialty={$specialty}")->order("id asc")->limit(4)->select();
	    	$gkClass=M("class")->where("class_type=3 AND specialty={$specialty}")->order("id asc")->limit(2)->select();
			//查询专业
			$special = M("special")->where("parentID= 0")->select();
			//专业映射
			$this->assign("special",$special);
			
			//跳转过去第一个视频
			$resData = M("zhangjie")->where("classID = {$_COOKIE['userID']}")->select();
			$this->assign("first", $resData[0]);
			
    	}else{
    		$fufeiClass=M("class")->where("class_type=1")->order("id asc")->limit(2)->select();
	    	$mfClass=M("class")->where("class_type=2")->order("id asc")->limit(4)->select();
	    	$gkClass=M("class")->where("class_type=3")->order("id asc")->limit(2)->select();
    	}
    	$allClass['fufei']=$fufeiClass;
  		$allClass['mf']=$mfClass;
  		$allClass['gk']=$gkClass;
    	$this->assign("allClass",$allClass);
    	$this->assign("index",'index');
    	$this->display();
    }
}
//<select name="" style="width: 70%; border:none; background-color: transparent; appearance:none;-moz-appearance:none;-webkit-appearance:none;">
//						<volist name="special" id="special" >
//						<option value="" style=" width: 70%; border:none; background-color: transparent; appearance:none;-moz-appearance:none;-webkit-appearance:none;">{$special.type_name}</option>
//						</volist>
//					</select>