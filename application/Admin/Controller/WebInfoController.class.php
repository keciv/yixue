<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class WebInfoController extends BaseController {

	public function index(){
		$new=M("webinfo")->order("id desc")->find();
		$this->assign("new",$new);
		$this->display();
	}

	public function lianxi(){
		$new=M("dibu")->order("id desc")->find();
		$this->assign("new",$new);
		$this->display();
	}

	public function update(){
		$info=M("webinfo")->where("id={$id}")->order("id desc")->find();
		$title=$_POST['title'];
		$keywords=$_POST['keywords'];			
		$description=$_POST['description'];
		if($info>0)
		{
			$result=M("webinfo")->where("id={$id}")->save(array('title'=>$title,'keywords'=>$keywords,description=>$description,'quanxian'=>'1'));			
			if (false!==$result){
				$this->success("设置成功！");
			}else {
				$this->success("设置失败！");
			}
		}
		else{
			$result=M("webinfo")->data(array('title'=>$title,'keywords'=>$keywords,description=>$description))->add();		
			if (false!==$result){
				$this->success("设置成功！");
			}else {
				$this->success("设置失败！");
			}
		}
	}

	public function call(){
		$info=M("dibu")->where("id={$id}")->order("id desc")->find();
					
		$content=$_POST['content'];
		if($info>0)
		{
			$result=M("dibu")->where("id={$id}")->save(array('content'=>$content));			
			if (false!==$result){
				$this->success("设置成功！");
			}else {
				$this->success("设置失败！");
			}
		}else{
			$result=M("dibu")->data(array('content'=>$content))->add();		
			if (false!==$result){
				$this->success("设置成功！");
			}else {
				$this->success("设置失败！");
			}
		}
	}
}