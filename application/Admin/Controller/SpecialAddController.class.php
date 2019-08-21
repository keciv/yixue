<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class SpecialAddController extends BaseController {
	public function index(){
		$optionStr="";
		$typeArr=M('special')->where("parentID=0")->select();
		//产生缩进字符串 —
		// $indentStr=str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;|—",$num);
		// $num++;
		foreach($typeArr as $v){
			$optionStr.="<option value='{$v['id']}'>{$v['type_name']}</option>";	
			//获取子级
			// $sonStr=getTypeByOption_lanmu($v['id'],$num);//getTypeByOption(2)
			// $optionStr.=$sonStr;
		}
		// $optionStr=getTypeByOption_lanmu();
		$this->assign("optionStr",$optionStr);		
		$this->assign("caozuo",'add');
		$this->display();
	}
	public function special_add(){
		$id=$_POST['parentID'];
		$type_name=$_POST['type_name'];
		if (!empty($type_name)){
			$str=M("special")->where("type_name='{$type_name}'")->find();
			if ($str>0){
				$this->success("该专业已存在！");
				die;
			}else {
				$last = M("special")->order('SortID desc')->find();
				$result=M("special")->data(array('type_name'=>$type_name,'parentID'=>$id,'SortID'=>$last['SortID']+1))->add();
				if ($result>0){
					jump("添加成功！",__APP__."/SpecialAdd/index");
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
		$type = M("special")->where("id={$id}")->find();
		$this->assign('type',$type);
		$types=M("special")->where("parentID=0")->select();
		$optionStr="";
		foreach ($types as $v) {
			if($v['id']==$type['parentID']){
				$optionStr.="<option value='{$v['id']}' selected>{$v['type_name']}</option>";
			}else{
				$optionStr.="<option value='{$v['id']}'>{$v['type_name']}</option>";
			}
		}
		$this->assign("parentlanmu",$parentlanmu);
		// $optionStr=getTypeByOption_type();
		$this->assign("optionStr",$optionStr);	
		$this->assign("caozuo",'edit');

		$this->display('SpecialAdd/index');
	}

	public function special_edit(){
		$id=$_POST['id'];
		$type_name=$_POST['type_name'];
		$parentID=$_POST['parentID'];
		if($id!=null){
			if($type_name!=null){
				$type=M("special")->where("type_name='{$type_name}'")->find();
				if($type!=null){
					$this->success("请确认该栏目存在！");
				}else {
					$result=M("special")->where("id='{$id}'")->save(array('type_name'=>$type_name,'parentID'=>$parentID));
					if (false!==$result){
						jump("修改成功！",__APP__."/Special_edit_$id");
					}
					else {
						jump("修改失败！");
					}
				}
			}else {
				$this->success("请填写完整信息后再添加！");
			}
		}else{
			$this->success("请选择要修改的栏目！");
		}
		
	}

	public function del(){
		$id=$_GET['id'];
		$lanmu = M("special")->where("id={$id}")->find();
		if($lanmu!=null)
		{
			$children = M("special")->where("parentid={$id}")->find();
			if($children!=null)
			{
				jump("该栏目还有子栏目存在，请先删除子栏目后再删除该栏目！",__APP__."/SpecialList/index");
			}
			else
			{
				$result=M("special")->where("id={$id}")->delete();
				if ($result>0) {
					$this->success("删除成功!");
				}else {
					$this->success("删除失败");
				}
			}
		}
	}
	
}