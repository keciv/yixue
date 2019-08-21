<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class MfClassController extends BaseController {
	public function index(){
		$info=cookie();
		$user=M("user")->where("id={$info['userID']}")->find();
		$this->assign("user",$user);
		$this->assign("info",$info);
		$this->display();

	}

	//课程分类
	public function mfClass_type(){
		$type=M("class_type")->where("parentID = 0")->select();
		$this->ajaxReturn($type);
	}

	//课程分类视频
	public function mfClass_typeClass(){
		//课程类型id
		$id=I("post.id");
		$typeClass=M("class")->where("cat_id={$id} AND specialty = {$_COOKIE['special']}")->select();
		$this->ajaxReturn($typeClass);
	}

	//课程全部视频
	public function class_video(){
		$id = I("post.id");
		$video=M("class")->where("specialty={$id} ")->select();
		//如果是null说明没有专业,是游客模式
		if($video==null){
			$video=M("class")->where("class_type = 2")->select();
		}
		$this->ajaxReturn($video);
	}
}