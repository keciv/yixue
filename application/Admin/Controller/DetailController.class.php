<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class DetailController extends BaseController {
	public function index(){
		// $optionStr=getTypeByOption_lanmu();
		// $this->assign("optionStr",$optionStr);		
		$this->assign("caozuo",'add');
		$this->display();
	}

	public function info(){
		$id=$_GET['id'];
		$question=M("idea")->where("id=$id")->find();
		$user=M("user")->where("id={$question['userID']}")->find();
		$this->assign("question",$question);
		$this->assign("user",$user);
		$this->display('Detail/index');
	}

	public function yijian(){
		$id=$_GET['id'];
		$question=M("idea")->where("id=$id")->find();
		$user=M("user")->where("id={$question['userID']}")->find();
		$this->assign("type",'yijian');
		$this->assign("question",$question);
		$this->assign("user",$user);
		$this->display('Detail/index');
	}


	// public function type_add(){
	// 	if (!empty($_POST)){
	// 		$type_name=$_POST['type'];
	// 		if (!empty($type_name)){
	// 			$str=M("special")->where("type_name='{$type_name}'")->find();
	// 			if ($str!=null){
	// 				$this->success("该栏目已存在！");
	// 				die;
	// 			}else {
	// 				$last = M("special")->order('sortID desc')->find();
	// 				$result=M("special")->data(array('type_name'=>$type_name,'parentID'=>0,'SortID'=>$last['SortID']+1))->add();
	// 				if ($result>0){
	// 					jump("添加成功！",__APP__."/TypeAdd/index");
	// 				}else {
	// 					jump("添加失败！");
	// 				}				
	// 			}
				
	// 		}
	// 	}
	// 	else {
	// 		$this->success("请填写完整信息后再添加！");
	// 	}
	// }
	
	
}