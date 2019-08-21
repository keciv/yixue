<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class QuestionListController extends BaseController {
	public function index(){
		$totalRow=M('idea')->where("type=1")->count();
		$page = new Page($totalRow,10);
		$question=M("idea")->where("type=1")->order("id desc")->limit("$page->firstRow,$page->listRows")->select();
		foreach ($question as $key => $value) {
			$id=$value['userID'];
			$user=M("user")->where("id=$id")->find();
			$nickname=$user['nickname'];
			$question[$key]['user']=$nickname;
		}
		$this->assign("pagelist",$page->show());
		$this->assign("totalRow",$totalRow);
		$this->assign("question",$question);
		$this->display();
	}
}
