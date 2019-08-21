<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class GkClassController extends BaseController {
	public function index(){
		$info=cookie();
		$user=M("user")->where("id={$info['userID']}")->find();
		$this->assign("user",$user);
		$this->assign("info",$info);
		$this->display();

	}

	public function returnGkData()
    {
        $resData = M("class")->where("class_type = 3 ")->select();
        $this->ajaxReturn($resData);
    }

}