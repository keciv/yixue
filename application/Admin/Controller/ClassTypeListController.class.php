<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class ClassTypeListController extends BaseController {
	public function index(){
		$totalRow=M('class_type')->count();
		$page = new Page($totalRow,10);
		$classType=M("class_type")->order("id asc")->limit("$page->firstRow,$page->listRows")->select();
		$this->assign("pagelist",$page->show());
		$this->assign("totalRow",$totalRow);
		$this->assign("classType",$classType);
		$this->display();
	}
}
