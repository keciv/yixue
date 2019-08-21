<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class IdeaListController extends BaseController {
	public function index(){
		//获取所有分类，递归,拼tr td

		// $trStr=getTypeByTr_type();
		// $this->assign("trStr",$trStr);
		$totalRow=M('idea')->where("type=0")->count();
		$page = new Page($totalRow,10);
		$question=M("idea")->where("type=0")->order("id desc")->limit("$page->firstRow,$page->listRows")->select();
		foreach ($question as $key => $value) {
			$id=$value['userID'];
			$user=M("user")->where("id=$id")->find();
			$nickname=$user['nickname'];
			$question[$key]['user']=$nickname;
		}
		$this->assign("totalRow",$totalRow);
		$this->assign("pagelist",$page->show());
		$this->assign("question",$question);
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
