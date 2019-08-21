<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class SpecialListController extends BaseController {
	public function index(){
		//获取所有分类，递归,拼tr td

		$trStr=getTypeByTr_type();
		$this->assign("trStr",$trStr);
		
		$this->display();
	}


	// public function Info(){
	// 	$id=$_GET['id'];
	// 	$type = M("special")->where("id={$id}")->find();
	// 	$this->assign('type',$type);
	// 	$parentlanmu = M("special")->where("id={$type['parentID']}")->find();
	// 	if($parentlanmu<=0)
	// 	{
	// 		$parentlanmu=array(id=>0);
	// 	}
	// 	$this->assign("parentlanmu",$parentlanmu);
	// 	$optionStr=getTypeByOption_lanmu();
	// 	$this->assign("optionStr",$optionStr);	
	// 	$this->assign("caozuo",'edit');

	// 	$this->display('SpecialAdd/index');
	// }
}
