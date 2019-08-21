<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class SfClassController extends BaseController {
	public function index(){
		$info=cookie();
		$user=M("user")->where("id={$info['userID']}")->find();
		$this->assign("user",$user);
		$this->assign("info",$info);
		$this->display();
	}

	public function getSfClass()
    {
        $resData = M("class")->where("class_type = 1 AND specialty = {$_COOKIE['special']}")->select();
        $this->ajaxReturn($resData);
    }
}