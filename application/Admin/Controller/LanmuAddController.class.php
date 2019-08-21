<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class LanmuAddController extends BaseController {
	public function index(){
		$optionStr=getTypeByOption_lanmu();
		$this->assign("optionStr",$optionStr);		
		$this->assign("caozuo",'add');
		$this->display();
	}
	public function lanmu_add(){
		if (!empty($_POST)){
			$title=$_POST['title'];
			$controller=$_POST['controller'];
			$parentID=$_POST['parentID'];
			
			if($parentid==null)
			{
				$parentid="0";
			}
			if (!empty($title)){
				$str=M("lanmu")->where("title={$title}")->find();
				if ($str>0){
					$this->success("该栏目已存在！");
					die;
				}else {
					$last = M("lanmu")->order('sortID desc')->find();
					$result=M("lanmu")->data(array('title'=>$title,'parentID'=>$parentID,'controller'=>$controller,'SortID'=>$last['SortID']+1))->add();					
				}
				if ($result>0){
					jump("添加成功！",__APP__."/LanmuAdd/index");
				}else {
					jump("添加失败！");
				}
			}
		}
		else {
			$this->success("请填写完整信息后再添加！");
		}
	}
	
	public function Info(){
		$id=$_GET['id'];
		$lanmu = M("lanmu")->where("id={$id}")->find();
		$this->assign('lanmu',$lanmu);
		$parentlanmu = M("lanmu")->where("id={$lanmu['parentID']}")->find();
		if($parentlanmu<=0)
		{
			$parentlanmu=array(id=>0);
		}
		$this->assign("parentlanmu",$parentlanmu);
		$optionStr=getTypeByOption_lanmu();
		$this->assign("optionStr",$optionStr);	
		$this->assign("caozuo",'edit');

		$this->display('LanmuAdd/index');
	}

	public function lanmu_edit(){
		$id=$_POST['id'];
		if($id!=null)
		{
			$lanmu=M("lanmu")->where("id={$id}")->find();
			if ($lanmu!=null){
				if (!empty($_POST)){
					$title=$_POST['title'];
					$parentID=$_POST['parentID'];
					$controller=$_POST['controller'];
					
					
					if($parentID==null)
					{
						$parentID="0";
					}
					if (!empty($title)){
						$result=M("lanmu")->where("id='{$id}'")->save(array('title'=>$title,'parentID'=>$parentID,'controller'=>$controller));
						if (false!==$result){
							jump("修改成功！",__APP__."/Lanmu_edit_$id");
						}
						else {
							jump("修改失败！");
						}
					}
				}
				else {
					$this->success("请填写完整信息后再添加！");
				}
			}
			else {
				$this->success("请确认该栏目存在！");
			}
		}
		else
		{
			$this->success("请选择要修改的栏目！");
		}
		
		
	}
	public function del(){
		$id=$_GET['id'];
		$lanmu = M("lanmu")->where("id={$id}")->find();
		if($lanmu>0)
		{
			$children = M("lanmu")->where("parentid={$id}")->find();
			if($children>0)
			{
				jump("该栏目还有子栏目存在，请先删除子栏目后再删除该栏目！",__APP__."/LanmuList/index");
			}
			else
			{
				$result=M("lanmu")->where("id={$id}")->delete();
				if ($result>0) {
					$this->success("删除成功!");
				}else {
					$this->success("删除失败");
				}
			}
		}
	}
	
}