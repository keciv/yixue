<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Think\Page;
class ShitiListController extends BaseController {
	public function index(){
		$totalRow=M('daily_problem')->count();
		$page = new Page($totalRow,10);
		$shiti=M("daily_problem")
			->join('special on daily_problem.specialty=special.id' )
			->field('special.type_name,daily_problem.*')
			->order("id desc")->limit("$page->firstRow,$page->listRows")->select();
		$this->assign("pagelist",$page->show());
		$this->assign("totalRow",$totalRow);
		$this->assign("shiti",$shiti);
		$this->display();
	}
}
