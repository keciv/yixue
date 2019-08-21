<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class MyClassController extends BaseController {
	public function index(){
		$userid=cookie('userID');
		$info=M("my_class as a")
			->join("class as b on a.classID=b.id")
			->where("b.class_type != 1")
			->field("a.id,b.class_title")
			->select();
		$this->assign("info",$info);
		$this->display();
	}

	//付费课程
	public function fufei_class(){
		$userid=cookie('userID');
		$info=M("my_class as a")
			->join("class as b on a.classID=b.id")
			->where("b.class_type = 1")
			->field("a.id,b.class_title")
			->select();
		$this->ajaxReturn($info);
	}

}